<?php

    // Start the page
    require_once 'views.php';

    $page_title = 'MVC Pattern - Step 1';
    begin_page($page_title);

    require_once 'subscriber_db.php';
    local_connect();



    //require 'test.php';


    // End the page
    end_page();
?>