<?php
echo "<h3>Environment Variables Check:</h3>";
echo "MYSQL_HOST: " . (getenv("MYSQL_HOST") ?: 'NOT SET') . "<br>";
echo "MYSQLUSER: " . (getenv("MYSQLUSER") ?: 'NOT SET') . "<br>";
echo "MYSQL_DATABASE: " . (getenv("MYSQL_DATABASE") ?: 'NOT SET') . "<br>";
echo "MYSQLPORT: " . (getenv("MYSQLPORT") ?: '3306') . "<br>";
echo "MYSQL_ROOT_PASSWORD: " . (getenv("MYSQL_ROOT_PASSWORD") ? 'SET' : 'NOT SET') . "<br>";

// Test the connection
include 'pdo.php';
echo "<h3>Database Status:</h3>";
echo "Connected successfully to database: " . getenv("MYSQL_DATABASE");
?>
