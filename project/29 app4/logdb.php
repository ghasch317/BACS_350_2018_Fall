<?php

    // Connect to the remote database
    function remote_connect2() {

    $port = '3306';
    $dbname = 'ghaschba_album';
    $username = 'ghaschba_350';
    $password = 'Winogrd123!!';
    $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
        
        return db_connect2($db_connect, $username, $password);

    }


    // Local Host Database settings
    /* function local_connect2() {

        $host = 'localhost';
        $dbname = 'log';
        $username = 'root';
        $password = '';
        $db_connect = "mysql:host=$host;dbname=$dbname";
        return db_connect2($db_connect, $username, $password);

    }*/


    // Open the database or die
    function db_connect2($db_connect, $username, $password) {
        
//        echo "<h2>DB Connection</h2><p>Connect String:  $db_connect, $username, $password</p>";
        try {
            $db = new PDO($db_connect, $username, $password);
//             echo '<p><b>Successful Connection</b></p>';
            return $db;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }


    // Open the database or die
    function connect_database2() {
        
        $local = ($_SERVER['SERVER_NAME'] == 'localhost');
        if ($local) {
            return local_connect2();
        } 
        else {
            return remote_connect2();
        }
        
    }

?>
