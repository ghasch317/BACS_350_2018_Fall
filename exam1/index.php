<!DOCTYPE html>
<html lang="en">
    
    <head> 

        <meta charset="UTF-8">
        <title>
            BACS 350 - Exam 1
        </title>
        <link rel="stylesheet" href="style.css">
        
        <?php
            include 'header.php';
        ?>

    </head>
    
    <body>
        <header>
        
        </header>
        <main>
            <a href="../">Home</a>
            <h1>Contact List</h1>

            <ul>
                <li>Test, Test, Test</li>
            </ul>
            
            <a href="insert.php">Add a Contact</a>
            <form action="insert.php" method="get">
        
        <p><label>name:</label> &nbsp; <input type="text" name="name"></p>
        <p><label>address:</label> &nbsp; <input type="text" name="address"></p>
        <p><label>phone:</label> &nbsp; <input type="text" name="phone"></p>
        
        <p><input type="submit" value="Add Contact"/></p>
        
    </form>         
        <?php
            include 'footer.php';
        ?>
        </main>
        
    </body>
    
</html>

