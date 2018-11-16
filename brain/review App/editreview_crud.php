<?php

    require_once 'views.php';

    // Connect to the database
    require_once 'review_db.php';


    // Lookup Record using ID
    function get_album($db, $id) {
        $query = "SELECT * FROM review WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        return $record;
    }


    // Show form for adding a record
    function edit_review_view($page, $record) {
        $id    = $record['id'];
        $date1  = $record['date1'];
        $reviewer = $record['reviewer'];
        $pageurl = $record['pageurl'];
        $scorecard = $record['scorecard'];
        $score = $record['score'];

        return '
            <div class="card">
                <h3>Edit Review</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Date:</label> &nbsp; <input type="text" name="date1" value="' . $date1 . '"></p>
                    
                    <p><label>Reviewers Email:</label> &nbsp; <input type="text" name="reviewer" value="' . $reviewer . '"></p>
                    
                    <p><label>Page URL:</label> &nbsp; <input type="text" name="pageurl" value="' . $pageurl . '"></p>
                    
                    <p><label>Score Card:</label> &nbsp; <input type="text" name="scorecard" value="' . $scorecard . '"></p>
                    
                    <p><label>Score out of 10:</label> &nbsp; <input type="text" name="score" value="' . $score . '"></p>
                    
                    <p><input type="submit" value="Save Record"/></p>
                    
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
            </div>
        ';
    }


    // Update the database
    function edit_subscriber() {
        $id    = filter_input(INPUT_POST, 'id');
        $date1  = filter_input(INPUT_POST, 'date1');
        $reviewer = filter_input(INPUT_POST, 'reviewer');
        $pageurl = filter_input(INPUT_POST, 'pageurl');
        $scorecard = filter_input(INPUT_POST, 'scorecard');
        $score = filter_input(INPUT_POST, 'score')

        echo "edit: $artist $name $artwork $purchase $description $review";

        // Modify database row
        $query = "UPDATE subscribers SET name = :name, email = :email WHERE id = :id";
        global $db;
        $statement = $db->prepare($query);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':reviewer', $reviewer);
        $statement->bindValue(':pageurl', $pageurl);
        $statement->bindValue(':scorecard', $scorecard);
        $statement->bindValue(':score', $score);

        $statement->execute();
        $statement->closeCursor();
        
        header('Location: crud_read.php');
    }
 
    // Controller to add record

    $content = 'No action given';

    // Show edit form
    $id = filter_input(INPUT_GET, 'id');
    if (! empty($id)) {
        // Find Data Record
        $record = get_subscriber($db, $id);
        $content = edit_subscriber_view('crud_update.php', $record);
    }
    
    // Modify Database Record
    $action = filter_input(INPUT_POST, 'action');
    if ($action == 'edit') {
        edit_subscriber();
    }
   

    // Create main part of page content
    $settings = array(
        "site_title" => "Subscriber CRUD Templates",
        "page_title" => "CRUD - UPDATE", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
?>
