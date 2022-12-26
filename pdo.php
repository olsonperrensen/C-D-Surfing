<?php
// ~~~~~~~~ IMPORTANT ! ~~~~~~~~


// If you are running it locally and directly via (X)AMP: 
//      *USE* host=localhost 



// Else, if you are running Docker: 
//      *USE* host=mysql

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL")) ?? '';
$cleardb_server = $cleardb_url["host"] ?? 'localhost';
$cleardb_username = $cleardb_url["user"] ?? 'Webuser';
$cleardb_password = $cleardb_url["pass"] ?? 'Lab2021';
$cleardb_db = substr($cleardb_url["path"], 1) ?? 'pets';
$active_group = 'default';
$query_builder = TRUE;

// Configured for local deployment as default
$pdo = new PDO(
    "mysql:host=$cleardb_server;port=3306;dbname=$cleardb_db",
    "$cleardb_username",
    "$cleardb_password",
    array(PDO::MYSQL_ATTR_FOUND_ROWS => true)
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
