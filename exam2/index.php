<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 Garrett Hasch';
    $page_title = 'Exam 2';
    begin_page($site_title, $page_title);
    
    // Bring in notes logic
    require_once 'album.php';


    // Render a list of albums
    $album->show_album();
    

    // Show the add form
    $album->add_form();


    // Button to clear
    echo '<a href="delete.php">Reset All Albums</a>';


    end_page();
?>

<html lang="en">
    
    <hr>
    
    <head>

        <meta charset="UTF-8">

    </head>
    <body>

        <header>
        </header>
        
        <main>
            
        <div class="card" brd-20>

        <p>
        <h1 id="red-hot-chili-peppers">Red Hot Chili Peppers</h1>
        
        <h2 id="amazon.com">Califonication on Amazon.com</h2>
        <p><a href="https://www.amazon.com/s/?ie=UTF8&keywords=red+hot+chili+peppers+band&tag=googhydr-20&index=aps&hvadid=229005047416&hvpos=1t1&hvnetw=g&hvrand=12731189918354041689&hvpone=&hvptwo=&hvqmt=b&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9028926&hvtargid=kwd-296392001950&ref=pd_sl_rrl536if8_b_p38"> 
        <img src="rhcp.PNG" height = "400" width = "400"/></a></p>
        
        <dl>
            <dt><a href="https://www.amazon.com/s/?ie=UTF8&keywords=red+hot+chili+peppers+band&tag=googhydr-20&index=aps&hvadid=229005047416&hvpos=1t1&hvnetw=g&hvrand=12731189918354041689&hvpone=&hvptwo=&hvqmt=b&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9028926&hvtargid=kwd-296392001950&ref=pd_sl_rrl536if8_b_p38">Amazon.com</a></dt>
        </dl>
            
        </div>
        
        <hr>
        
        <div class="card2" brd-20>

        <p>
        <h1 id="blink182">Blink182</h1>
        
        <h2 id="amazon.com">Blink182 on Amazon.com</h2>
        <p><a href="https://www.amazon.com/Blink-182/dp/B0000DZDTG"> 
        <img src="blink.png" height = "400" width = "400"/></a></p>
        
        <dl>
            <dt><a href="https://www.amazon.com/Blink-182/dp/B0000DZDTG">Amazon.com</a></dt>
        </dl>
            
        </div>
            
        <hr>
            
        <p>Make sure that the page exists and has valid HTML.<h3>Page Exists</h3>
            
        <p><a href="http://http://ghaschbacs350.com/exam2/index.php">/bacs_350/exam2/index.php</a></p><h3>Valid HTML</h3><p>

        <hr>

        <p><a href="http://validator.w3.org">HTML Validator</a></p>

        <p><a href="http://validator.w3.org/nu/?doc=http://ghaschbacs350.com/bacs_350/project/10/index.php">Validate Page: ghaschbacs350.com/exam2/index.php</a></p>


            
        </main>
    </body>
</html>