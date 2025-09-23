<?php
/**
 * Railway-optimized database connection
 */

// Use Railway's standard MySQL environment variables
$db_host = getenv("MYSQL_HOST") ?: 'localhost';
$db_user = getenv("MYSQLUSER") ?: 'root';
// Try common Railway password variable names
$db_password = getenv("MYSQL_ROOT_PASSWORD") ?: getenv("MYSQLPASSWORD") ?: '';
$db_name = getenv("MYSQL_DATABASE") ?: 'railway';
$db_port = getenv("MYSQLPORT") ?: 3306;

// Debug: Log the connection attempt (check these in your Railway logs)
error_log("DB Connection Attempt - Host: $db_host, User: $db_user, DB: $db_name, Port: $db_port");

try {
    $dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";
    
    $pdo = new PDO(
        $dsn,
        $db_user,
        $db_password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 30,
        ]
    );
    
    // Test connection
    $pdo->query('SELECT 1');
    error_log("Database connected successfully to $db_name");
    
} catch (PDOException $e) {
    // Detailed error for debugging in logs
    error_log("Database connection FAILED: " . $e->getMessage());
    error_log("Connection details used - Host: $db_host, User: $db_user, DB: $db_name, Port: $db_port");

    // User-friendly message
    if (getenv('RAILWAY_ENVIRONMENT') !== 'production') {
        die('Database connection failed: ' . $e->getMessage());
    } else {
        die('Database connection failed. Please try again later.');
    }
}
?>
