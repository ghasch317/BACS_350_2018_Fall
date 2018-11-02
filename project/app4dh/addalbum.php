<?php

    // Start the page
    require_once 'views.php';
 
    $content = '';
                
    //$content .= render_card ("PURCHASE", $message);
    $settings = array(
        "site_title" => "App 4",
        "page_title" => "App 4 Add Album", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);


    // Page Content
    echo '<p><a href="index.php">Exam 2</a></p>';
    // Button to clear
    echo '<p><a href="delete.php">Reset Albums</a></p>';

    
    // Bring in subscribers logic
    require_once 'album.php';
   

    // Show the add form
    $album->add_form();


    


    end_page();
?>