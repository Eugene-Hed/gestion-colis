<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/FileBasedDatabase.php';

use Colis\Database;

$pdo = Database::getInstance();

// For file-based DB, it auto-initializes
if (method_exists($pdo, 'exec')) {
    $sql = <<<SQL
CREATE TABLE IF NOT EXISTS shipments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sender_name VARCHAR(255),
  sender_phone VARCHAR(20),
  sender_email VARCHAR(255),
  receiver_name VARCHAR(255),
  receiver_phone VARCHAR(20),
  receiver_email VARCHAR(255),
  description TEXT,
  value DECIMAL(10,2) DEFAULT 0,
  price DECIMAL(10,2) DEFAULT 0,
  status VARCHAR(50) DEFAULT 'registered',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  arrived_at TIMESTAMP NULL,
  picked_at TIMESTAMP NULL,
  INDEX idx_status (status),
  INDEX idx_created (created_at)
);
SQL;
    $pdo->exec($sql);
}

echo "✓ Database initialized successfully.\n";
echo "✓ Using " . (method_exists($pdo, 'getShipments') ? "file-based" : "MySQL") . " storage.\n";
echo "✓ Visit http://localhost:8000 to get started.\n";
