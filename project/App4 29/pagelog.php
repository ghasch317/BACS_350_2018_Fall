<?php

    // Start the page
    require_once 'views.php';
 
    $content = '';
                
    //$content .= render_card ("PURCHASE", $message);
    $settings = array(
        "site_title" => "App 4",
        "page_title" => "App 4 Page Log", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);


    // Page Content
    echo '<p><a href="index.php">Exam 2</a></p>';
    // Clear the list by sending "action" of "clear" to this view
    echo '<p><a href="pagelog.php?action=clear" class="btn">Clear Log</a></p>';
      

    // Handle any actions required
    require_once 'log.php';
    $log->handle_actions();
    

    // Show page history
    $log->show_log();


    


    end_page();
?>
