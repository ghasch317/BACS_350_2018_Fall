<?php

    
    // Start the page
    require_once 'views.php';
    require_once 'files.php';
    require_once 'review.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page("Review App");

    $content = '';
                
    //$content .= render_card ("PURCHASE", $message);
    $settings = array(
        "site_title" => "Review App",
        "page_title" => "Brain App", 
        "style"      => 'darktheme.css',
        "content"    => $content);


    echo render_page($settings);
    echo '<p><a href="pagelog.php">Page log</a></p>';
    echo '<p><a href="addreview.php">Add Review</a></p>';
    echo '<p><a href="editreview_crud.php">Edit Review</a></p>';

    $review-> show_review();


    //end_page();
?>