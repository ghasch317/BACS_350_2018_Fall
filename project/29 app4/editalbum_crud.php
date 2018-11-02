<?php

    require_once 'views.php';

    // Connect to the database
    require_once 'album_db.php';


    // Lookup Record using ID
    function get_album($db, $id) {
        $query = "SELECT * FROM album WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        return $record;
    }


    // Show form for adding a record
    function edit_album_view($page, $record) {
        $id    = $record['id'];
        $artist  = $record['artist'];
        $name = $record['name'];
        $artwork = $record['artwork'];
        $purchase = $record['purchase'];
        $description = $record['description'];
        $review = $record['review'];
        return '
            <div class="card">
                <h3>Edit Album</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Artist:</label> &nbsp; <input type="text" name="artist" value="' . $artist . '"></p>
                    <p><label>Name:</label> &nbsp; <input type="text" name="name" value="' . $name . '"></p>
                    <p><label>Artwork Link:</label> &nbsp; <input type="text" name="artowrk" value="' . $artwork . '"></p>
                    <p><label>Purchase Link:</label> &nbsp; <input type="text" name="purchase" value="' . $purchase . '"></p>
                    <p><label>Description:</label> &nbsp; <input type="text" name="description" value="' . $description . '"></p>
                    <p><label>Review:</label> &nbsp; <input type="text" name="review" value="' . $review . '"></p>
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
        $artist  = filter_input(INPUT_POST, 'artist');
        $name = filter_input(INPUT_POST, 'name');
        $artwork = filter_input(INPUT_POST, 'artwork');
        $purchase = filter_input(INPUT_POST, 'purchase');
        $description = filter_input(INPUT_POST, 'description');
        $review = filter_input(INPUT_POST, 'review');

        echo "edit: $artist $name $artwork $purchase $description $review";

        // Modify database row
        $query = "UPDATE subscribers SET name = :name, email = :email WHERE id = :id";
        global $db;
        $statement = $db->prepare($query);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':artist', $artist);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':artwork', $artwork);
        $statement->bindValue(':purchase', $purchase);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':review', $review);

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
