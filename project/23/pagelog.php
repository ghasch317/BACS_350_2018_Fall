<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 Garrett Hasch';
    $page_title = 'Project 23';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';
    echo '<p><a href="../14/index.php">Subscribers</a></p>';
      

    // Handle any actions required
    require_once 'log.php';
    $log->handle_actions();
    

    // Show page history
    $log->show_log();


    // Clear the list by sending "action" of "clear" to this view
    echo '<p><a href="pagelog.php?action=clear" class="btn">Clear Log</a></p>';


    end_page();
?>