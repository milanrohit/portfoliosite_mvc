<?php
namespace App\Core;

use PDO;

class Crud {
    protected $pdo;
    protected $prefix;
    public function __construct(PDO $pdo, $prefix = '') {
        $this->pdo = $pdo;
        $this->prefix = $prefix;
    }
    public function create($table, array $data) {
        $table = $this->prefix . $table;
        $fields = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $stmt = $this->pdo->prepare("INSERT INTO $table ($fields) VALUES ($placeholders)");
        return $stmt->execute(array_values($data));
    }
    public function read($table, $where = '', $params = []) {
        $table = $this->prefix . $table;
        $sql = "SELECT * FROM $table" . ($where ? " WHERE $where" : '');
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($table, array $data, $where, $params = []) {
        $table = $this->prefix . $table;
        $set = implode(', ', array_map(fn($k) => "$k = ?", array_keys($data)));
        $stmt = $this->pdo->prepare("UPDATE $table SET $set WHERE $where");
        return $stmt->execute(array_merge(array_values($data), $params));
    }
    public function delete($table, $where, $params = []) {
        $table = $this->prefix . $table;
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE $where");
        return $stmt->execute($params);
    }
} 