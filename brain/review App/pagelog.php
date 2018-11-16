<?php

    // Start the page
    require_once 'views.php';
 
    $content = '';
                
    //$content .= render_card ("PURCHASE", $message);
    $settings = array(
        "site_title" => "Review App",
        "page_title" => "Brain App", 
        "style"      => 'darktheme.css',
        "content"    => $content);

    echo render_page($settings);

    // Page Content
    echo '<p><a href="http://ghaschbacs350.com/brain/index.html">Brain</a></p>';
    // Clear the list by sending "action" of "clear" to this view
    echo '<p><a href="pagelog.php?action=clear" class="btn">Clear Log</a></p>';
      

    // Handle any actions required
    require_once 'log.php';
    $log->handle_actions();
    

    // Show page history
    $log->show_log();


    


    end_page();
?>
