<?php

    require_once 'views.php';

    // Connect to the database
    require_once 'db.php';


    // Controller to add record

    $content = 'No action given';
   
    $content = $subscribers->handle_actions();
    

    // Create main part of page content
    $settings = array(
        "site_title" => "Subscriber CRUD Templates",
        "page_title" => "CRUD - UPDATE", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
?>
