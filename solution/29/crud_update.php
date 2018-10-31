<?php

    require_once 'views.php';

    // Connect to the database
    require_once 'db.php';


    // Controller to add record

    $content = 'No action given';


    // Show edit form
    $action = filter_input(INPUT_GET, 'action');
    $id = filter_input(INPUT_GET, 'id');
    if ($action == 'edit' and ! empty($id)) {
        // Find Data Record
        $record = $subscribers->get($id);
        $content = $subscribers->edit_view($record);
    }
    

    // Modify Database Record
    $action = filter_input(INPUT_POST, 'action');
    if ($action == 'update') {
        $subscribers->edit_view($record);
    }
   

    // Create main part of page content
    $settings = array(
        "site_title" => "Subscriber CRUD Templates",
        "page_title" => "CRUD - UPDATE", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
?>
