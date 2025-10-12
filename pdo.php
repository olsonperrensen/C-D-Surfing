<?php
$database_url = getenv("DATABASE_URL");

if (strpos($database_url, 'postgresql://') === 0) {
    $url = parse_url($database_url);
    $db_host = $url['host'];
    $db_user = $url['user'];
    $db_password = $url['pass'];
    $db_name = ltrim($url['path'], '/');
    $db_port = $url['port'] ?: 5432;
} else {
    $db_host = getenv("PGHOST") ?: 'localhost';
    $db_user = getenv("PGUSER") ?: 'postgres';
    $db_password = getenv("PGPASSWORD") ?: '';
    $db_name = getenv("PGDATABASE") ?: 'railway';
    $db_port = getenv("PGPORT") ?: 5432;
}

error_log("Parsed connection - Host: $db_host, User: $db_user, DB: $db_name, Port: $db_port");

try {
    $dsn = "pgsql:host=$db_host;port=$db_port;dbname=$db_name";
    
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
