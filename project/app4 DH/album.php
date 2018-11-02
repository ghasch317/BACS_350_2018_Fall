<?php

    // Bring in subscribers logic
    require_once 'album_db.php';
    require_once 'album_crud.php';
    require_once 'album_views.php';


    // My Subscriber list
    class Album {

        // Database connection
        private $db;

        
        // Automatically connect
        function __construct() {
            $this->db =  album_connect();
        }

        
        // CRUD
        
        function query() {
            return query_albums($this->db);
        }
        
    
        function clear() {
            return clear_albums($this->db);
        }
        
        
        function add($artist, $name, $artwork, $purchase, $description, $review) {
            return add_album ($this->db, $artist, $name, $artwork, $purchase, $description, $review);
        }
        
        
        //Views
        
        function show_albums() {
            render_list($this->query());
        }
        
        
        function add_form() {
            add_album_form();
        }
    }


    // Create a list object and connect to the database
    $album = new Album;

?>
