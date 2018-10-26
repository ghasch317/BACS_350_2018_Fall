<?php

    function add_album_form() {
        
        echo '
            <div class="card">
                <h3>Add a Album</h3>
            
                <form action="insert.php" method="post">
                    <p><label>Artist:</label> &nbsp; <input type="text" name="artist"></p>
                    <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
                    <p><label>Artwork:</label> &nbsp; <input type="text" name="artwork"></p>
                    <p><label>Purcahse URL:</label> &nbsp; <input type="text" name="url"></p>
                    <p><label>Descrition:</label> &nbsp; <input type="text" name="description"></p>
                    <p><label>Review:</label> &nbsp; <input type="text" name="review"></p>
                    <p><input type="submit" value="Submit"/></p>
                </form>
            </div>
            ';
        
    }

    function render_list($list) {

        echo '
            <div class="card">
                <h3>Albums in List</h3> 
                <ul>
            ';
        foreach ($list as $s) {
            echo '<li>' . $s['id'] . ' '. $s['artist'] . ', ' . $s['name'] . ', ' . $s['artwork'] . ', ' . 
                $s['url'] . ', ' . $s['description'] . ', ' . $s['review'] . '</li>';
        }
        echo '
                </ul>
            </div>';
    
    }

?>