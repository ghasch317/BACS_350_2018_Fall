<!DOCTYPE html>
<html lang="en">
    
    <header>
		<h1><img src="../../images/Bear3.png" width ="100" height ="100" alt="Bear logo">Page Title</h1>
        
        <link rel="stylesheet" type="text/css" href="styles.css">
        
        <?php

            $page_title = "Project #7";
            include "header.php";
            echo "<h1>" . $page_title . "</h2>";
            echo "<p>Help me ... I'm trapped inside this computer.</p>";
            include "footer.php";
        

        ?>
    </header>
    
    
        <body>
            <h1>BACS 350 - PROJECT #7</h1>
            <p>
                This is my <a href="../../index.php">home page</a>
                for the UNC BACS 350 class.
            </p>
            
            <?php

                // Form the DB Connection string
                $port = '3306';
                $dbname = 'ghaschba_subscribers';
                $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
                $username = 'ghaschba_350';
                $password = 'Winogrd123!!';

                echo "<h1>DB Connection</h1>" .
                "<p>Connect String: $db_connect, $username, $password</p>";


                // Open the database or die
                try {
                $db = new PDO($db_connect, $username, $password);
                echo '<p><b>Successful Connection</b></p>';
                } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                }

                // Query for all subscribers
                $query = "SELECT * FROM subscribers1";

                $statement = $db->prepare($query);
                $statement->execute();


                // Loop over all of the subscribers to make a bullet list
                $subscribers = $statement->fetchAll();
                echo '<ul>';
                foreach ($subscribers as $s) {
                echo '<li>' . $s['name'] . ', ' . $s['email'] . '</li>';
                }
                echo '</ul>';


                // Add database row
                $query = "INSERT INTO subscribers1 (name, email) VALUES (:name, :email);";

                $statement = $db->prepare($query);

                $statement->bindValue(':name', $name);
                $statement->bindValue(':email', $email);

                $statement->execute();
                $statement->closeCursor();


        ?>
           
         <h1>-Update- </h1>
        <p><li><a href="https://github.com/ghasch317"> my github</a></li></p>
        
        <hr>
            
    </body>
    
    <hr>
    
    <footer>
    </footer>
    
</html>
