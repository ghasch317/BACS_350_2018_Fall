<?php

    // Bring in Notes logic
    require_once 'notes_db.php';
    require_once 'notes_crud.php';
    require_once 'notes_views.php';


    // My Note list
    class Notes {

        // Database connection
        private $db;

        
        // Automatically connect
        function __construct() {
            $this->db =  notes_connect();
        }

        
        // CRUD
        
        function query() {
            return query_notes($this->db);
        }
        
    
        function clear() {
            return clear_notes($this->db);
        }
        
        
        function add($title, $date, $body) {
            return add_notes ($this->db, $title, $date, $body);
        }
        
        
        //Views
        
        function show_notes() {
            render_list($this->query());
        }
        
        
        function add_form() {
            add_notes_form();
        }
    }


    // Create a list object and connect to the database
    $notes = new notes;

?>
