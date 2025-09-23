<?php
// ~~~~~~~~ IMPORTANT ! ~~~~~~~~
// If you are running it locally and directly via (X)AMP: 
//      *USE* host=localhost 
// Else, if you are running Docker: 
//      *USE* host=mysql
// For Railway deployment: Uses DATABASE_URL or MYSQL_URL environment variables

// Get Railway DATABASE_URL or fallback to Heroku ClearDB
$database_url = getenv("DATABASE_URL") ?: getenv("MYSQL_URL") ?: getenv("CLEARDB_DATABASE_URL");

if ($database_url) {
    // Parse the database URL (Railway/Heroku format)
    $cleardb_url = parse_url($database_url);
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"], 1);
    $cleardb_port = $cleardb_url["port"] ?? 3306;
} else {
    // Fallback to environment variables or defaults
    $cleardb_server = getenv("DB_HOST") ?: getenv("MYSQL_HOST") ?: 'localhost';  // Changed from 'mysql' to 'localhost'
    $cleardb_username = getenv("DB_USER") ?: getenv("MYSQL_USER") ?: 'Webuser';
    $cleardb_password = getenv("DB_PASSWORD") ?: getenv("MYSQL_PASSWORD") ?: 'Lab2021';
    $cleardb_db = getenv("DB_NAME") ?: getenv("MYSQL_DATABASE") ?: 'pets';
    $cleardb_port = getenv("DB_PORT") ?: getenv("MYSQL_PORT") ?: 3306;
}

$active_group = 'default';
$query_builder = TRUE;

// Debug output (remove after testing)
error_log("Connecting to: Host=$cleardb_server, Port=$cleardb_port, DB=$cleardb_db, User=$cleardb_username");

try {
    // Configured for Railway deployment with fallback to local
    $pdo = new PDO(
        "mysql:host=$cleardb_server;port=$cleardb_port;dbname=$cleardb_db",
        "$cleardb_username",
        "$cleardb_password",
        array(PDO::MYSQL_ATTR_FOUND_ROWS => true)
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Test the connection
    $pdo->query('SELECT 1');
    error_log("Database connection successful!");
    
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    error_log("Connection details: Host=$cleardb_server, Port=$cleardb_port, DB=$cleardb_db, User=$cleardb_username");
    
    // Show user-friendly error
    die("Database connection failed. Please check your database configuration. Error: " . $e->getMessage());
}
?>
