<?php

    // Decide on the domain and page to test
    $domain = "https:/ghaschbacs350.com";
    $page = "../bacs_350/project/13/index.php";
    $url = "$domain/$page";

    // Create a link for the page
    echo "<h2>Test Page for $page</h2>
        <p>Start simple but start now.</p>
        <p>Make sure that the page exists and has valid HTML.";

    echo '<h3>Page Exists</h3>
        <p><a href="' . $url . '">' . $page . '</a></p>';

    // Run your page through the validator
    $validator = 'http://validator.w3.org';
    echo "<h3>Valid HTML</h3><p><a href=\"$validator\">HTML Validator</a></p>";

    $validator_url = "$validator/nu/?doc=$url";
    echo "<p><a href=\"$validator_url\">Validate Page: $url</a></p>";


?>