<?php

    /*
        add_subscriber_form -- Create an HTML form to add record.
    */

    function add_review_form() {
        
        echo '
            <div class="card2">
                <h3>Add Review</h3>
            
            <form action="insert.php" method="post">
                <p>Designer Email: hasc9362@bears.unco.edu</p>
                
                <p><label>Reviewers Email:</label> &nbsp;</p>
                <p><textarea name="reviewer" id="textbox" rows = "1" cols = "40"></textarea></p>
                <p><label>Review Page URL:</label> &nbsp;
                <p><textarea name="pageurl" id="textbox" rows = "1" cols = "40"></textarea></p>
                <p><label>Paste Score Card:</label> &nbsp; </p>
                <p><textarea name="scorecard" id="textbox" rows = "10" cols = "40" name="scorecard" id="textbox"></textarea></p>
                <p><label>Final Score out of 10:</label> &nbsp;
                <p><textarea name="score" id="textbox" rows = "1" cols = "3"></textarea></p>
                <p><input type="submit" value="Enter Review"/></p>
                </form>
            </div>
            ';
        
    }

    
    /*
        render_list -- Loop over all of the subscribers to make a bullet list
    */
 
    function render_list($list) {

        echo '
                <h3>Reviews in List</h3> 
            ';
        foreach ($list as $s) {
            echo '<div class="card">';
            echo'<h1>' . $s['reviewer'] . '</h1>';
            //echo '<img src="'. $s['pageurl'] .'" width = 500 height = 500 alt="PageURL"/>';
            echo'<p>' .'<a href="'. $s['pageurl'] .'">Reviwers Email</a>'. ', ' . $s['reviewer'] . ', ' . $s['scorecard'] . ', '.  $s['score'] .'</p>';
            echo '
            </div>';
        }
    
    }
    

?>