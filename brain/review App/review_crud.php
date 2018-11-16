<?php

    // Add a new record
    function add_review($db, $reviewer, $pageurl, $scorecard, $score) {

        // Show if insert is successful or not
        try {

            // Add database row
            $query = "INSERT INTO review (reviewer, pageurl, scorecard, score) VALUES (:reviewer, :pageurl, :scorecard, :score);";
            $statement = $db->prepare($query);

            $statement->bindValue(':reviewer', $reviewer);
            $statement->bindValue(':pageurl', $pageurl);
            $statement->bindValue(':scorecard', $scorecard);
            $statement->bindValue(':score', $score);

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
    function clear_review($db) {
        
        try {
            $query = "DELETE FROM review";
            $statement = $db->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }

    // Query for all subscribers
    function query_review($db) {

        $query = "SELECT * FROM review";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }

?>