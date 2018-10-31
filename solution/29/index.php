<?php
    
    require_once 'log.php';
    require_once 'subscriber.php';
    require_once 'views.php';


    // Log the page load
    $log->log_page();


    // Display the page content
    
    $list = $subscribers->show_list();
    $content = render_card("Subscribers", $list);


    // Create main part of page content
    $settings = array(
        "site_title" => "Email Manager",
        "page_title" => "Demo of CRUD Logic", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);



?>
