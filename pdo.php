<?php
// Railway-compatible pdo.php with comprehensive debugging
// ~~~~~~~~ IMPORTANT ! ~~~~~~~~
// If you are running it locally and directly via (X)AMP: 
//      *USE* host=localhost 
// Else, if you are running Docker: 
//      *USE* host=mysql
// For Railway deployment: Uses DATABASE_URL or MYSQL_URL environment variables

// ==============================================
// COMPREHENSIVE RAILWAY DEBUG LOGGING
// ==============================================
error_log("=====================================");
error_log("🚀 RAILWAY PHP-MYSQL CONNECTION DEBUG");
error_log("=====================================");
error_log("⏰ Timestamp: " . date('Y-m-d H:i:s T'));
error_log("🖥️  Server Info: PHP " . phpversion() . " on " . php_uname('s'));
error_log("🏠 Document Root: " . $_SERVER['DOCUMENT_ROOT']);
error_log("🌐 HTTP Host: " . ($_SERVER['HTTP_HOST'] ?? 'CLI'));

// Log all available environment variables (filtered for security)
error_log("📊 ENVIRONMENT VARIABLES SCAN:");
$env_vars = ['DATABASE_URL', 'MYSQL_URL', 'CLEARDB_DATABASE_URL', 'DB_HOST', 'DB_USER', 'DB_NAME', 'DB_PORT', 'MYSQL_HOST', 'MYSQL_USER', 'MYSQL_DATABASE', 'MYSQL_PORT', 'RAILWAY_ENVIRONMENT', 'PORT'];
foreach ($env_vars as $var) {
    $value = getenv($var);
    if ($value) {
        // Mask passwords for security
        if (strpos($var, 'PASSWORD') !== false || strpos($var, 'PASS') !== false) {
            error_log("   $var = [MASKED]");
        } elseif ($var === 'DATABASE_URL' || $var === 'MYSQL_URL') {
            // Show masked version of connection string
            $masked = preg_replace('/(:\/\/)([^:]+):([^@]+)(@)/', '$1$2:[MASKED]$4', $value);
            error_log("   $var = $masked");
        } else {
            error_log("   $var = $value");
        }
    } else {
        error_log("   $var = NOT SET");
    }
}

error_log("=====================================");

// Get Railway DATABASE_URL or fallback to other providers
$database_url = getenv("DATABASE_URL") ?: getenv("MYSQL_URL") ?: getenv("CLEARDB_DATABASE_URL");

error_log("🔍 DATABASE URL DETECTION:");
if ($database_url) {
    error_log("   ✅ Database URL found!");
    error_log("   📝 Source: " . (getenv("DATABASE_URL") ? "DATABASE_URL" : (getenv("MYSQL_URL") ? "MYSQL_URL" : "CLEARDB_DATABASE_URL")));
    
    // Parse the database URL (Railway/Heroku format)
    $cleardb_url = parse_url($database_url);
    
    if ($cleardb_url === false) {
        error_log("   ❌ ERROR: Failed to parse DATABASE_URL!");
        error_log("   🔧 Raw URL format might be invalid");
        $cleardb_url = [];
    } else {
        error_log("   ✅ URL parsed successfully");
        error_log("   📋 Parsed components:");
        foreach ($cleardb_url as $key => $value) {
            if ($key === 'pass') {
                error_log("      $key = [MASKED]");
            } else {
                error_log("      $key = $value");
            }
        }
    }
    
    $cleardb_server = $cleardb_url["host"] ?? 'unknown';
    $cleardb_username = $cleardb_url["user"] ?? 'unknown';
    $cleardb_password = $cleardb_url["pass"] ?? '';
    $cleardb_db = isset($cleardb_url["path"]) ? substr($cleardb_url["path"], 1) : 'unknown';
    $cleardb_port = $cleardb_url["port"] ?? 3306;
    
} else {
    error_log("   ⚠️  No DATABASE_URL found, using fallback environment variables");
    
    // Fallback to environment variables or defaults
    $cleardb_server = getenv("DB_HOST") ?: getenv("MYSQL_HOST") ?: '127.0.0.1';
    $cleardb_username = getenv("DB_USER") ?: getenv("MYSQL_USER") ?: 'Webuser';
    $cleardb_password = getenv("DB_PASSWORD") ?: getenv("MYSQL_PASSWORD") ?: 'Lab2021';
    $cleardb_db = getenv("DB_NAME") ?: getenv("MYSQL_DATABASE") ?: 'pets';
    $cleardb_port = getenv("DB_PORT") ?: getenv("MYSQL_PORT") ?: 3306;
    
    error_log("   📋 Fallback values used:");
    error_log("      Host source: " . (getenv("DB_HOST") ? "DB_HOST" : (getenv("MYSQL_HOST") ? "MYSQL_HOST" : "DEFAULT")));
    error_log("      User source: " . (getenv("DB_USER") ? "DB_USER" : (getenv("MYSQL_USER") ? "MYSQL_USER" : "DEFAULT")));
    error_log("      DB source: " . (getenv("DB_NAME") ? "DB_NAME" : (getenv("MYSQL_DATABASE") ? "MYSQL_DATABASE" : "DEFAULT")));
}

error_log("=====================================");
error_log("🎯 FINAL CONNECTION PARAMETERS:");
error_log("   Host: $cleardb_server");
error_log("   Port: $cleardb_port");
error_log("   Database: $cleardb_db");
error_log("   Username: $cleardb_username");
error_log("   Password: " . (empty($cleardb_password) ? "EMPTY!" : "[SET - " . strlen($cleardb_password) . " chars]"));

// Railway compatibility check
if (strpos($cleardb_server, 'railway') !== false) {
    error_log("   🚂 Railway MySQL service detected!");
} elseif ($cleardb_server === '127.0.0.1' || $cleardb_server === 'localhost') {
    error_log("   🏠 Local development environment detected");
} else {
    error_log("   ☁️  External database service detected");
}

error_log("=====================================");

$active_group = 'default';
$query_builder = TRUE;

try {
    error_log("🔌 ATTEMPTING DATABASE CONNECTION...");
    
    // Force TCP connection to avoid socket issues
    $dsn = "mysql:host=$cleardb_server;port=$cleardb_port;dbname=$cleardb_db;charset=utf8mb4";
    
    // If localhost, force TCP instead of socket
    if ($cleardb_server === 'localhost') {
        $dsn = "mysql:host=127.0.0.1;port=$cleardb_port;dbname=$cleardb_db;charset=utf8mb4";
        error_log("   🔧 Forcing TCP connection (127.0.0.1) instead of socket");
    }
    
    error_log("   📡 DSN: $dsn");
    
    // Create PDO connection with comprehensive options
    $pdo = new PDO(
        $dsn,
        $cleardb_username,
        $cleardb_password,
        array(
            PDO::MYSQL_ATTR_FOUND_ROWS => true,
            PDO::ATTR_TIMEOUT => 30,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
        )
    );
    
    error_log("   ✅ PDO object created successfully!");
    
    // Test the connection with a simple query
    error_log("🧪 TESTING CONNECTION...");
    $test_result = $pdo->query('SELECT 1 as test, NOW() as server_time, DATABASE() as current_db, USER() as current_user, VERSION() as mysql_version');
    $test_data = $test_result->fetch();
    
    error_log("   ✅ Connection test successful!");
    error_log("   📊 Server Details:");
    error_log("      MySQL Version: " . $test_data['mysql_version']);
    error_log("      Current Database: " . $test_data['current_db']);
    error_log("      Current User: " . $test_data['current_user']);
    error_log("      Server Time: " . $test_data['server_time']);
    
    // Check available databases
    error_log("📋 AVAILABLE DATABASES:");
    try {
        $db_result = $pdo->query('SHOW DATABASES');
        $databases = $db_result->fetchAll(PDO::FETCH_COLUMN);
        foreach ($databases as $db) {
            error_log("   - $db" . ($db === $cleardb_db ? " (CURRENT)" : ""));
        }
    } catch (Exception $e) {
        error_log("   ⚠️  Could not list databases: " . $e->getMessage());
    }
    
    // Check tables in current database
    error_log("📊 TABLES IN CURRENT DATABASE ($cleardb_db):");
    try {
        $table_result = $pdo->query('SHOW TABLES');
        $tables = $table_result->fetchAll(PDO::FETCH_COLUMN);
        if (empty($tables)) {
            error_log("   ⚠️  No tables found! Database might be empty.");
        } else {
            foreach ($tables as $table) {
                // Get row count for each table
                try {
                    $count_result = $pdo->query("SELECT COUNT(*) as count FROM `$table`");
                    $count = $count_result->fetch()['count'];
                    error_log("   - $table ($count rows)");
                } catch (Exception $e) {
                    error_log("   - $table (count error: " . $e->getMessage() . ")");
                }
            }
        }
    } catch (Exception $e) {
        error_log("   ❌ Could not list tables: " . $e->getMessage());
    }
    
    error_log("=====================================");
    error_log("🎉 DATABASE CONNECTION SUCCESSFUL!");
    error_log("✅ Ready to handle application requests");
    error_log("=====================================");
    
} catch (PDOException $e) {
    error_log("=====================================");
    error_log("❌ DATABASE CONNECTION FAILED!");
    error_log("=====================================");
    error_log("💥 PDO Error: " . $e->getMessage());
    error_log("🔍 Error Code: " . $e->getCode());
    error_log("📍 Error Location: " . $e->getFile() . " line " . $e->getLine());
    error_log("🔧 Connection Details Used:");
    error_log("   Host: $cleardb_server");
    error_log("   Port: $cleardb_port");
    error_log("   Database: $cleardb_db");
    error_log("   Username: $cleardb_username");
    error_log("   DSN: $dsn");
    
    // Common error diagnosis
    error_log("🩺 ERROR DIAGNOSIS:");
    if (strpos($e->getMessage(), 'Access denied') !== false) {
        error_log("   🚫 DIAGNOSIS: Authentication failed - check username/password");
    } elseif (strpos($e->getMessage(), 'Connection refused') !== false) {
        error_log("   🚫 DIAGNOSIS: Server not accepting connections - check host/port");
    } elseif (strpos($e->getMessage(), 'No such file or directory') !== false) {
        error_log("   🚫 DIAGNOSIS: Socket connection issue - using TCP should fix this");
    } elseif (strpos($e->getMessage(), 'Unknown database') !== false) {
        error_log("   🚫 DIAGNOSIS: Database '$cleardb_db' does not exist");
    } elseif (strpos($e->getMessage(), 'getaddrinfo') !== false) {
        error_log("   🚫 DIAGNOSIS: DNS resolution failed - host '$cleardb_server' not found");
    } else {
        error_log("   🤔 DIAGNOSIS: Unknown error - check all connection parameters");
    }
    
    error_log("🔧 TROUBLESHOOTING STEPS:");
    error_log("   1. Verify Railway MySQL service is running");
    error_log("   2. Check environment variables are set correctly");
    error_log("   3. Ensure database exists and has proper permissions");
    error_log("   4. Verify network connectivity to database host");
    error_log("=====================================");
    
    // Show user-friendly error in production
    if (getenv('RAILWAY_ENVIRONMENT') === 'production') {
        die("Database connection failed. Please try again later. (Error logged)");
    } else {
        die("Database connection failed: " . $e->getMessage() . 
            "<br><strong>Check the error logs above for detailed diagnosis.</strong>");
    }
}

// Additional connection health check
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set timezone if possible
    $pdo->exec("SET time_zone = '+00:00'");
    error_log("⏰ Timezone set to UTC");
    
} catch (Exception $e) {
    error_log("⚠️  Minor setup warning: " . $e->getMessage());
}

error_log("🏁 PDO SETUP COMPLETE - Application ready to use \$pdo object");
error_log("=====================================");
?>
