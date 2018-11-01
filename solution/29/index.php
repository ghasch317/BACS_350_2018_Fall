<?php
    
    require_once 'log.php';
    require_once 'subscriber.php';
    require_once 'views.php';


    // Log the page load
    $log->log_page();
    $content = render_button('Show Log', 'pagelog.php');

    // Display the page content
    $content .= $subscribers->handle_actions();


    // Create main part of page content
    $settings = array(
        "site_title" => "Email Manager",
        "page_title" => "Demo of Data App", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
