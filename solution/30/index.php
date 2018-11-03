<?php
    
    require_once 'log.php';
    require_once 'views.php';


    // Log the page load
    $log->log_page();

    
    // Set the password into the administrator table
    function register_user($db, $email, $password, $first, $last) {
        
        $log->log("$email, $first, $last");
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = 'INSERT INTO administrators (email, password, firstName, lastName) 
            VALUES (:email, :password, :first, :last);';
        
        $statement = $db->prepare($query);
        
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':first', $first);
        $statement->bindValue(':last', $last);
        
        $statement->execute();
        $statement->closeCursor();
    
    }


    // Display if password is valid or not
    function show_valid ($db, $email, $password) {
        
        $content = "<p>User: $email</p><p>Password: $password</p><p>Hash: $hash</p>";
        $valid_password = is_valid_login ($db, $email, $password);
        
        if ($valid_password) {
            $log->log("User Verified: $email");
            $content .= '<p>Is Valid</p>';
        }
        else {
            $log->log("Bad user login: $email");
            $content .= '<p>NOT Valid</p>';
        }
        return $content;
        
    }


    // Check to see that the password in OK
    function is_valid_login ($db, $email, $password) {
        
        $query = 'SELECT password FROM administrators WHERE email=:email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = $row['password'];
        $log->log("User login check: $email, $hash");
        return password_verify($password, $hash);
        
    }


    // Try this login

    $email = "me@here.com";
    $password = 'Rock on dude!';

//    register_user($db, $email, $password, 'Test', 'Robot');
        

    // Display the page content
    $content = render_button('Show Log', 'pagelog.php');
    $content .= show_valid ($db, $email, $password);


    // Create main part of page content
    $settings = array(
        "site_title" => "System Admins",
        "page_title" => "User Authentication", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
