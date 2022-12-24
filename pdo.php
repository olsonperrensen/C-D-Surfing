<?php
// ~~~~~~~~ IMPORTANT ! ~~~~~~~~


// If you are running it locally and directly via (X)AMP: 
//      *USE* host=localhost 



// Else, if you are running Docker: 
//      *USE* host=mysql


// Configured for local deployment as default
$pdo = new PDO(
    'mysql:host=localhost;port=3306;dbname=pets',
    'Webuser',
    "Lab2021",
    array(PDO::MYSQL_ATTR_FOUND_ROWS => true)
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
