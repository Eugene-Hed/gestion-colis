<?php
namespace Colis;

class ShipmentModel {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createShipment(array $d)
    {
        $price = $this->calculatePrice($d['value']);
        $stmt = $this->pdo->prepare("INSERT INTO shipments (sender_name,sender_phone,sender_email,receiver_name,receiver_phone,receiver_email,description,value,price,status) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([
            $d['sender_name'],$d['sender_phone'],$d['sender_email'],$d['receiver_name'],$d['receiver_phone'],$d['receiver_email'],$d['description'],$d['value'],$price,'registered'
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM shipments ORDER BY id DESC');
        if (method_exists($stmt, 'execute')) {
            // For FileBasedStatement, execute without params for SELECT all
            $stmt->execute();
        }
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM shipments WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function markArrived(int $id)
    {
        $stmt = $this->pdo->prepare("UPDATE shipments SET status='arrived', arrived_at = NOW() WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function markPickedUp(int $id)
    {
        $stmt = $this->pdo->prepare("UPDATE shipments SET status='picked_up', picked_at = NOW() WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function calculatePrice($value)
    {
        return round($value * 0.10, 2);
    }
}
