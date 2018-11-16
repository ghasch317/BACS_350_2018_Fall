<?php
    // Bring in album logic
    require_once 'review_db.php';
    require_once 'review_crud.php';
    require_once 'review_views.php';
    
    // My album list
    class review{
        // Database connection
        private $db;
        
        // Automatically connect
        function __construct() {
            $this->db =  review_connect();
        }
        
        // CRUD
        
        function query() {
            return query_review($this->db);
        }
        
    
        function clear() {
            return clear_review($this->db);
        }
        
        
        function add($reviewer, $pageurl, $scorecard, $score) {
            return add_review ($this->db, $reviewer, $pageurl, $scorecard, $score);
        }
        
        
        //Views
        
        function show_review() {
            render_list($this->query());
        }
        
        
        function add_form() {
            add_review_form();
        }
    }
    
    // Create a list object and connect to the database
    $review = new review;
?>