<?php
    
    require_once 'log.php';
    require_once 'views.php';


    // Log the page load
    $log->log_page();


    // Display the page content
    $content = render_button('Show Log', 'pagelog.php');

//    function verify_password_setup() {
//        $email = "me@here.com";
//        $password = 'Rock on dude!';
//        $hash = password_hash($password, PASSWORD_DEFAULT);
//        $content = "<p>User: $email</p><p>Password: $password</p><p>Hash: $hash</p>";
//
//        $valid_password = password_verify($password, $hash);
//        if ($valid_password) {
//            $content .= '<p>Is Valid</p>';
//        }
//        else {
//            $content .= '<p>NOT Valid</p>';
//        }
//        return $content;
//    }
    // $content .= verify_password_setup();



    // Check to see that the password in OK
    function is_valid_login ($email, $password) {
        global $db;
        $query = 'SELECT password FROM administrators WHERE email=:email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = $row['password'];
        return password_verify($password, $hash);
    }

    // Try this login
    $email = "me@here.com";
    $password = 'Rock on dude!';
    $valid_password = is_valid_login ($email, $password);
 
    if ($valid_password) {
        $content .= '<p>Is Valid</p>';
    }
    else {
        $content .= "<p>Password is NOT Valid</p>" . "<p>User: $email</p><p>Password: $password</p>";
    }


    // Create main part of page content
    $settings = array(
        "site_title" => "System Admins",
        "page_title" => "User Authentication", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
