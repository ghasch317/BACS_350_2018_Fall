<?php

    require_once 'views.php';
 
    // Handle any page actions required
    require_once 'log.php';
    $log->handle_actions();
    $log->log_page();

    
    // Clear the list by sending "action" of "clear" to this view
    $clear = '<p><a href="pagelog.php?action=clear" class="btn">Clear Log</a></p>';
    
    // Add form
    $add = $log->show_add('pagelog.php');

    // Show page history
    $history = $log->show_log();

    $content =  $history . $add . $clear;

    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Display Pages loaded", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
