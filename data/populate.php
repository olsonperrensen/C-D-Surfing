<?php
$database_url = getenv("DATABASE_URL");

if (!$database_url) {
    die("ERROR: DATABASE_URL environment variable not found");
}

$url = parse_url($database_url);

$host = $url['host'];
$user = $url['user'];
$pass = $url['pass'];
$dbname = ltrim($url['path'], '/');
$port = $url['port'] ?? '5432';

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$pass";
$conn = pg_connect($conn_string);

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

echo "Connected to database successfully<br><br>";

$sql_file = '127_0_0_1.sql';
if (!file_exists($sql_file)) {
    die("SQL file not found: $sql_file");
}

$sql = file_get_contents($sql_file);

$result = pg_query($conn, $sql);

if ($result) {
    echo "Database populated successfully!<br>";
} else {
    echo "Error populating database: " . pg_last_error($conn) . "<br>";
}

pg_close($conn);
?>
