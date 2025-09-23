<?php
$mysql_host = getenv("MYSQL_HOST");
echo "MYSQL_HOST: " . $mysql_host . "<br>";

$url = parse_url($mysql_host);
echo "Parsed URL:<br>";
echo "Host: " . ($url['host'] ?? 'NOT FOUND') . "<br>";
echo "User: " . ($url['user'] ?? 'NOT FOUND') . "<br>";
echo "Password: " . (isset($url['pass']) ? 'SET' : 'NOT FOUND') . "<br>";
echo "Database: " . (isset($url['path']) ? ltrim($url['path'], '/') : 'NOT FOUND') . "<br>";
echo "Port: " . ($url['port'] ?? '3306') . "<br>";
?>
