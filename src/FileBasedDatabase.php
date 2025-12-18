<?php
namespace Colis;

/**
 * File-based database using JSON for demo/fallback.
 * Implements a minimal PDO-like interface.
 */
class FileBasedDatabase {
    private $path;
    private $data = [];
    private $lastId = 0;
    private $lastQuery = null;
    private $lastParams = [];

    public function __construct($path) {
        $this->path = $path;
        $this->load();
    }

    private function load() {
        if (file_exists($this->path)) {
            $content = file_get_contents($this->path);
            $this->data = json_decode($content, true) ?: ['shipments' => [], 'lastId' => 0];
            $this->lastId = $this->data['lastId'] ?? 0;
        } else {
            $this->data = ['shipments' => [], 'lastId' => 0];
            $this->save();
        }
    }

    private function save() {
        $this->data['lastId'] = $this->lastId;
        file_put_contents($this->path, json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function prepare($sql) {
        return new FileBasedStatement($this, $sql);
    }

    public function exec($sql) {
        // Ignore DDL (CREATE TABLE, etc)
        return 0;
    }

    public function query($sql) {
        return new FileBasedStatement($this, $sql);
    }

    public function lastInsertId() {
        return $this->lastId;
    }

    public function setAttribute($attr, $val) {
        // Ignore
    }

    // Helper methods for FileBasedStatement
    public function insertShipment($data) {
        $this->lastId++;
        $shipment = array_merge(['id' => $this->lastId, 'created_at' => date('Y-m-d H:i:s')], $data);
        $this->data['shipments'][] = $shipment;
        $this->save();
        return $this->lastId;
    }

    public function getShipments() {
        $sorted = $this->data['shipments'];
        usort($sorted, function($a, $b) { return $b['id'] - $a['id']; });
        return $sorted;
    }

    public function getShipmentById($id) {
        foreach ($this->data['shipments'] as $s) {
            if ((int)$s['id'] === (int)$id) return $s;
        }
        return null;
    }

    public function updateShipment($id, $updates) {
        foreach ($this->data['shipments'] as &$s) {
            if ((int)$s['id'] === (int)$id) {
                foreach ($updates as $k => $v) $s[$k] = $v;
                $this->save();
                return true;
            }
        }
        return false;
    }
}

class FileBasedStatement {
    private $db;
    private $sql;
    private $result = null;
    private $resultIndex = 0;

    public function __construct(FileBasedDatabase $db, $sql) {
        $this->db = $db;
        $this->sql = $sql;
    }

    public function execute($params = []) {
        // INSERT
        if (stripos($this->sql, 'INSERT INTO shipments') === 0) {
            $fields = [];
            if (preg_match('/\((.*?)\)\s*VALUES/i', $this->sql, $m)) {
                $fields = array_map('trim', explode(',', $m[1]));
            }
            $data = [];
            for ($i = 0; $i < count($fields); $i++) {
                if ($i < count($params)) {
                    $data[$fields[$i]] = $params[$i];
                }
            }
            $this->db->insertShipment($data);
            return true;
        }

        // UPDATE
        if (stripos($this->sql, 'UPDATE shipments SET') === 0) {
            if (preg_match('/WHERE id\s*=\s*\?/i', $this->sql)) {
                $id = array_pop($params);
                $updates = [];
                
                // Parse SET clause - regex improved to avoid capturing quotes
                if (preg_match('/SET\s+(.*?)\s+WHERE/i', $this->sql, $m)) {
                    $setParts = preg_split('/,\s*(?=\w+\s*=)/', trim($m[1]));
                    $paramIdx = 0;
                    foreach ($setParts as $part) {
                        if (preg_match('/(\w+)\s*=\s*(.*)/', trim($part), $n)) {
                            $field = $n[1];
                            $value = trim($n[2]);
                            
                            if ($value === '?') {
                                // If param is a string with quotes, remove them
                                $paramVal = $params[$paramIdx++] ?? null;
                                if (is_string($paramVal)) {
                                    $paramVal = trim($paramVal, "'\"");
                                }
                                $updates[$field] = $paramVal;
                            } elseif ($value === 'NOW()') {
                                $updates[$field] = date('Y-m-d H:i:s');
                            } else {
                                $updates[$field] = trim($value, "'\"");
                            }
                        }
                    }
                }
                return $this->db->updateShipment($id, $updates);
            }
        }

        // SELECT - store for fetch/fetchAll
        if (stripos($this->sql, 'SELECT') === 0) {
            if (stripos($this->sql, 'WHERE id') !== false) {
                // SELECT with WHERE id = ?
                if (count($params) > 0) {
                    $id = $params[0];
                    $result = $this->db->getShipmentById($id);
                    $this->result = $result ? [$result] : [];
                }
            } else {
                // SELECT all
                $this->result = $this->db->getShipments();
            }
            $this->resultIndex = 0;
            return true;
        }

        return false;
    }

    public function fetch($mode = null) {
        if ($this->result && $this->resultIndex < count($this->result)) {
            return $this->result[$this->resultIndex++];
        }
        return false;
    }

    public function fetchAll($mode = null) {
        return $this->result ?? [];
    }
}

