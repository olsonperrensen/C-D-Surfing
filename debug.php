<?php
$database_url = getenv("DATABASE_URL");
echo "DATABASE_URL: " . $database_url . "<br>";
$url = parse_url($database_url);
echo "Parsed URL:<br>";
echo "Host: " . ($url['host'] ?? 'NOT FOUND') . "<br>";
echo "User: " . ($url['user'] ?? 'NOT FOUND') . "<br>";
echo "Password: " . (isset($url['pass']) ? 'SET' : 'NOT FOUND') . "<br>";
echo "Database: " . (isset($url['path']) ? ltrim($url['path'], '/') : 'NOT FOUND') . "<br>";
echo "Port: " . ($url['port'] ?? '5432') . "<br>";
?>
