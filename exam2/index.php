<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 Garrett Hasch';
    $page_title = 'Exam 2';
    begin_page($site_title, $page_title);
    
    // Bring in notes logic
    require_once 'album.php';


    // Render a list of albums
    $album->show_album();
    

    // Show the add form
    $album->add_form();


    // Button to clear
    echo '<a href="delete.php">Reset All Albums</a>';


    end_page();
?>