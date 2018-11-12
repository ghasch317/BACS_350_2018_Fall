<?php

    // Add a new record
    function add_notes($db, $title, $date, $body) {

        // Show if insert is successful or not
        try {

            // Add database row
            $query = "INSERT INTO notes (title, date, body) VALUES (:title, :date, :body);";
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':body', $body);
            $statement->execute();
            $statement->closeCursor();
            return true;
             
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Delete all database rows
    function clear_notes($db) {
        
        try {
            $query = "DELETE FROM notes";
            $statement = $db->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Query for all notes
    function query_notes ($db) {

        $query = "SELECT * FROM notes";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }

?>
