<?php

    // Start the page
    require_once 'views.php';
 
    $content = '';
                
    //$content .= render_card ("PURCHASE", $message);
    $settings = array(
        "site_title" => "Reviews",
        "page_title" => "Add Review", 
        "style"      => 'darktheme.css',
        "content"    => $content);

    echo render_page($settings);


    // Page Content
    echo '<p><a href="http://ghaschbacs350.com/brain/index.html">Brain</a></p>';
    // Button to clear
    echo '<p><a href="delete.php">Reset Reviews</a></p>';

    
    // Bring in subscribers logic
    require_once 'review.php';
   

    // Show the add form
    $album->add_form();

    


    end_page();
?>