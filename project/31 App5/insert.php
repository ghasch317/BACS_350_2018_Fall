<?php


    // Connect to the database
    require_once 'album.php';


    // Pick out the inputs
    $artist  = filter_input(INPUT_POST, 'artist');
    $name = filter_input(INPUT_POST, 'name');
    $artwork = filter_input(INPUT_POST, 'artwork');
    $purchase = filter_input(INPUT_POST, 'purchase');
    $description = filter_input(INPUT_POST, 'description');
    $review = filter_input(INPUT_POST, 'review');


    // Add record
    if ($album->add($artist, $name, $artwork, $purchase, $description, $review)) 
    {
        header("Location: index.php");
        echo 'Insertion Success';
    }

?>

