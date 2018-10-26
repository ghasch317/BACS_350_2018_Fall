<?php

    // Add a new record
    function add_album($db, $artist, $name, $artwork, $url, $description, $review) {

        // Show if insert is successful or not
        try {

            // Add database row
            $query = "INSERT INTO album (artist, name, artwork, url, description, review) VALUES (:artist, :name, :artwork, :url, :description, :review);";
            $statement = $db->prepare($query);
            $statement->bindValue(':artist', $artist);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':artwork', $artwork);
            $statement->bindValue(':url', $url);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':review', $review);
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
    function clear_album($db) {
        
        try {
            $query = "DELETE FROM album";
            $statement = $db->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Query for all album
    function query_album ($db) {

        $query = "SELECT * FROM album";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }

?>
