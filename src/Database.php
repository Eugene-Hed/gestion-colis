<?php
namespace Colis;

class Database {
    private static $pdo;
    private static $jsonMode = false;

    public static function getInstance()
    {
        if (self::$pdo) return self::$pdo;
        
        // Try MySQL first
        try {
            $host = getenv('DB_HOST') ?: 'localhost';
            $port = getenv('DB_PORT') ?: 3306;
            $user = getenv('DB_USER') ?: 'root';
            $pass = getenv('DB_PASS') ?: '';
            $name = getenv('DB_NAME') ?: 'colis';
            
            $dsn = "mysql:host=$host;port=$port;charset=utf8mb4";
            self::$pdo = new \PDO($dsn, $user, $pass);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            // Create database if it doesn't exist
            self::$pdo->exec("CREATE DATABASE IF NOT EXISTS `$name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            
            // Select the database
            self::$pdo->exec("USE `$name`");
            
            error_log("[DB] Connected to MySQL");
            return self::$pdo;
        } catch (\Exception $e) {
            // Fallback: use SQLite or JSON
            error_log("[DB] MySQL failed: " . $e->getMessage() . " - falling back to file storage");
            return self::getFileBasedDB();
        }
    }

    private static function getFileBasedDB()
    {
        // Create a fake PDO-like object using file storage
        $dbPath = __DIR__ . '/../data/colis.json';
        if (!file_exists(dirname($dbPath))) {
            @mkdir(dirname($dbPath), 0777, true);
        }
        if (!file_exists($dbPath)) {
            file_put_contents($dbPath, json_encode(['shipments' => []]));
        }
        
        // Return PDO-like wrapper
        return new FileBasedDatabase($dbPath);
    }
}
