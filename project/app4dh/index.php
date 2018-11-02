<?php

    
    // Start the page
    require_once 'views.php';
    require_once 'files.php';
    require_once 'album.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page("App 4");

    $content = '';
                
    //$content .= render_card ("PURCHASE", $message);
    $settings = array(
        "site_title" => "App 4",
        "page_title" => "App 4 Home", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
    echo '<p><a href="pagelog.php">Page log</a></p>';
    echo '<p><a href="addalbum.php">Add Album</a></p>';

    $album->show_albums();


    //end_page();
?>
