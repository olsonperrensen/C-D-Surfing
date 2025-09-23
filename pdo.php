<?php
/**
 * Railway-optimized database connection
 */

// Use the exact environment variables you have
$db_host = getenv("MYSQL_HOST") ?: 'localhost';
$db_user = getenv("MYSQLUSER") ?: 'root';
$db_password = getenv("MYSQL_ROOT_PASSWORD") ?: '';
$db_name = getenv("MYSQL_DATABASE") ?: 'railway';
$db_port = getenv("MYSQLPORT") ?: 3306;

// Debug connection (remove in production)
error_log("Connecting to: $db_host:$db_port, database: $db_name, user: $db_user");

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
    error_log("Database connection failed: " . $e->getMessage());
    
    // Detailed error for debugging
    $error_details = "Host: $db_host:$db_port | User: $db_user | DB: $db_name | Error: " . $e->getMessage();
    error_log($error_details);
    
    if (getenv('RAILWAY_ENVIRONMENT') !== 'production') {
        die('Database connection failed: ' . $e->getMessage() . 
            "<br>Details: $error_details");
    } else {
        die('Database connection failed. Please try again later.');
    }
}
?>
