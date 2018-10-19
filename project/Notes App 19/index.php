<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 Garrett Hasch';
    $page_title = 'Notes App';
    begin_page($site_title, $page_title);
    
    // Bring in notes logic
    require_once 'notes.php';


    // Render a list of notes
    $notes->show_notes();
    

    // Show the add form
    $notes->add_form();


    // Button to clear
    echo '<a href="delete.php">Reset Notes</a>';


    end_page();
?>