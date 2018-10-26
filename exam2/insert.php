<?php
    
    // Prevent caching
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Cache-Control: no-store, no-cache, must-revalidate");


    // Connect to the database
    require_once 'album.php';


    // Pick out the inputs
    $artist  = filter_input(INPUT_POST, 'artist');
    $name = filter_input(INPUT_POST, 'name');
    $artwork  = filter_input(INPUT_POST, 'artwork');
    $url  = filter_input(INPUT_POST, 'url');
    $description  = filter_input(INPUT_POST, 'description');
    $review  = filter_input(INPUT_POST, 'review');


    // Add record
    if ($album->add ($artist, $name, $artwork, $url, $description, $review)) {
//      echo '<p><b>Insert successful</b>&nbsp;<a href="index.php">Album</a></p>';
//      $this->query();
        header("Location: index.php");
    }

?>

