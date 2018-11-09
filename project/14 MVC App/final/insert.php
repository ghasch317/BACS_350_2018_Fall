<?php

    // Connect to the database
    require_once 'subscriber_db.php';


    // Pick out the inputs
    $name = filter_input(INPUT_GET, 'name');
    $email = filter_input(INPUT_GET, 'email');


    // Add record
    //add_subscriber ($name, $email, 'index.php');


    //insert_subscriber ($name, $email);        // CREATE
    //list_subscribers ($name, $email);         // READ
    //update_subscriber ($id, $name, $email);   // UPDATE
    //delete_subscriber ($id);                // DELETE


    try {
        
        // Add database row
        $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";

        //$statement = $db->prepare($query);

        $statement->bindValue(':name',  $name);
        $statement->bindValue(':email', $email);

        $statement->execute();
        $statement->closeCursor();
        
        header('Location: index.php');

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
        die();
    }
?>