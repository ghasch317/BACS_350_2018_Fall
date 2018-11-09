<?php

    function add_notes_form() {
        
        echo '
            <div class="card">
                <h3>Add a note</h3>
            
                <form action="insert.php" method="post">
                    <p><label>Title:</label> &nbsp; <input type="text" name="title"></p>
                    <p><label>Date:</label> &nbsp; <input type="text" name="date"></p>
                    <p><label>Body:</label> &nbsp; <input type="text" name="body"></p>
                    <p><input type="submit" value="Submit"/></p>
                </form>
            </div>
            ';
        
    }

    function render_list($list) {

        echo '
            <div class="card">
                <h3>Notes in List</h3> 
                <ul>
            ';
        foreach ($list as $s) {
            echo '<li>' . $s['id'] . ' '. $s['title'] . ', ' . $s['date'] . ', ' . $s['body'] .'</li>';
        }
        echo '
                </ul>
            </div>';
    
    }

?>