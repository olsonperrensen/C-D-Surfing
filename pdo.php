<?php

// USE this if you run it locally on your OS server
$pdo = new PDO(
    'mysql:host=localhost;port=3306;dbname=pets',
    'Webuser',
    "Lab2021",
    array(PDO::MYSQL_ATTR_FOUND_ROWS => true)
);

// USE this while running on Docker
$pdo = new PDO(
    'mysql:host=mysql;port=3306;dbname=pets',
    'Webuser',
    "Lab2021",
    array(PDO::MYSQL_ATTR_FOUND_ROWS => true)
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
