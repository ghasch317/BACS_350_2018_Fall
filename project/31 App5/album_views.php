<?php

    /*
        add_subscriber_form -- Create an HTML form to add record.
    */

    function add_album_form() {
        
        echo '
            <div class="card2">
                <h3>Add Album</h3>
            
            <form action="insert.php" method="post">
                <p><label>Artist:</label> &nbsp; </p>
                <p><textarea name="artist" id="textbox" rows = "1" cols = "40"></textarea></p>
                <p><label>Album Name:</label> &nbsp;</p>
                <p><textarea name="name" id="textbox" rows = "1" cols = "40"></textarea></p>
                <p><label>Artwork Link:</label> &nbsp;
                <p><textarea name="artwork" id="textbox" rows = "1" cols = "40"></textarea></p>
                <p><label>Purchase Link:</label> &nbsp;
                <p><textarea name="purchase" id="textbox" rows = "1" cols = "40"></textarea></p>
                <p><label>Description:</label> &nbsp;
                <p><textarea name="description" id="textbox" rows = "2" cols = "40"></textarea></p>
                <p><label>Review:</label> &nbsp; </p>
                <p><textarea name="review" id="textbox" rows = "10" cols = "40" name="review" id="textbox"></textarea></p>
                <p><input type="submit" value="Enter Album"/></p>
                </form>
            </div>
            ';
        
    }


    
    /*
        render_list -- Loop over all of the subscribers to make a bullet list
    */
 
    function render_list($list) {

        echo '
                <h3>Albums in List</h3> 
            ';
        foreach ($list as $s) {
            echo '<div class="card">';
            echo'<h1>' . $s['name'] . '</h1>';
            echo '<img src="'. $s['artwork'] .'" width = 500 height = 500 alt="Artwork"/>';
            echo'<p>' . $s['artist'] . ', ' .'<a href="'. $s['purchase'] .'">Link To Purchase</a>'. ', ' . $s['description'] . ', ' . $s['review'] . '</p>';
            echo '
            </div>';
        }
    
    }
    

?>