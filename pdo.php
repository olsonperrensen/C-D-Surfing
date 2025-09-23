<?php
/**
 * Railway-optimized database connection
 */

// Get the MySQL connection string from MYSQL_HOST
$mysql_host = getenv("MYSQL_HOST") ?: 'localhost';

// Parse the connection string if it's in URL format
if (strpos($mysql_host, 'mysql://') === 0) {
    // Parse the MySQL URL format: mysql://user:password@host:port/database
    $url = parse_url($mysql_host);
    $db_host = $url['host'];
    $db_user = $url['user'] ?: 'root';
    $db_password = $url['pass'] ?: '';
    $db_name = isset($url['path']) ? ltrim($url['path'], '/') : 'railway';
    $db_port = $url['port'] ?: 3306;
} else {
    // Use individual environment variables
    $db_host = $mysql_host;
    $db_user = getenv("MYSQLUSER") ?: 'root';
    $db_password = getenv("MYSQL_ROOT_PASSWORD") ?: '';
    $db_name = getenv("MYSQL_DATABASE") ?: 'railway';
    $db_port = getenv("MYSQLPORT") ?: 3306;
}

// Debug: Check what we're connecting with
error_log("Parsed connection - Host: $db_host, User: $db_user, DB: $db_name, Port: $db_port");

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
    error_log("Database connection FAILED: " . $e->getMessage());
    error_log("Connection details - Host: $db_host, User: $db_user, DB: $db_name, Port: $db_port");

    if (getenv('RAILWAY_ENVIRONMENT') !== 'production') {
        die('Database connection failed: ' . $e->getMessage() . 
            "<br>Host: $db_host, User: $db_user, DB: $db_name, Port: $db_port");
    } else {
        die('Database connection failed. Please try again later.');
    }
}
?>
