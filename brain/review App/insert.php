<?php


    // Connect to the database
    require_once 'review.php';


    // Pick out the inputs

    $reviewer = filter_input(INPUT_POST, 'reviewer');
    $pageurl = filter_input(INPUT_POST, 'pageurl');
    $scorecard = filter_input(INPUT_POST, 'scorecard');
    $score = filter_input(INPUT_POST, 'score');


    // Add record
    if ($album->add($dates, $reviewer, $pageurl, $scorecard, $score)) 
    {
        header("Location: index.php");
        echo 'Insertion Success';
    }
?>