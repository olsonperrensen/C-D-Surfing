<?php
/**
 * Production-ready pdo.php for Railway deployment
 * Supports Railway MySQL environment variables with local fallback
 */

// Get Railway DATABASE_URL first (if provided)
$database_url = getenv("DATABASE_URL") ?: getenv("MYSQL_URL");

if ($database_url) {
    // Parse Railway/Heroku style DATABASE_URL
    $url_parts = parse_url($database_url);
    $db_host = $url_parts["host"];
    $db_user = $url_parts["user"];
    $db_password = $url_parts["pass"];
    $db_name = substr($url_parts["path"], 1);
    $db_port = $url_parts["port"] ?? 3306;
} else {
    // Use Railway MySQL environment variables
    $db_host = getenv("MYSQL_HOST") ?: 'localhost';
    $db_user = getenv("MYSQLUSER") ?: 'root';
    $db_password = getenv("MYSQL_ROOT_PASSWORD") ?: 'Lab2021';
    $db_name = getenv("MYSQL_DATABASE") ?: 'railway';
    $db_port = getenv("MYSQLPORT") ?: 3306;
}

// Create PDO connection
try {
    // Force TCP connection (avoid socket issues)
    $dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";
    
    // Use 127.0.0.1 instead of localhost to force TCP
    if ($db_host === 'localhost') {
        $dsn = "mysql:host=127.0.0.1;port=$db_port;dbname=$db_name;charset=utf8mb4";
    }
    
    $pdo = new PDO(
        $dsn,
        $db_user,
        $db_password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 30,
            PDO::MYSQL_ATTR_FOUND_ROWS => true,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]
    );
    
    // Test connection
    $pdo->query('SELECT 1');
    
    // Set timezone
    $pdo->exec("SET time_zone = '+00:00'");
    
} catch (PDOException $e) {
    // Production error handling
    error_log("Database connection failed: " . $e->getMessage());
    
    if (getenv('RAILWAY_ENVIRONMENT') === 'production') {
        die('Database connection failed. Please try again later.');
    } else {
        die('Database connection failed: ' . $e->getMessage());
    }
}
?>
