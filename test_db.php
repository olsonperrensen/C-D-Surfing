<?php
echo "<h3>Environment Variables:</h3>";
echo "MYSQLHOST: " . (getenv("MYSQLHOST") ?: 'NOT SET') . "<br>";
echo "MYSQLUSER: " . (getenv("MYSQLUSER") ?: 'NOT SET') . "<br>";
echo "MYSQLDATABASE: " . (getenv("MYSQLDATABASE") ?: 'NOT SET') . "<br>";
echo "MYSQLPORT: " . (getenv("MYSQLPORT") ?: '3306') . "<br>";

include 'pdo.php';
echo "<h3>Database Status:</h3>";
echo "Connected successfully!";
?>
