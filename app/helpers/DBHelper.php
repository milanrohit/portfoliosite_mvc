<?php
namespace App\Helpers;

use PDO;
use PDOException;

class DBHelper {
    private static $instance = null;
    private $pdo;
    private $table;
    private $where = '';
    private $params = [];
    private $limit = '';
    private $order = '';

    private function __construct() {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function table($table) {
        $instance = self::getInstance();
        $instance->table = $table;
        $instance->where = '';
        $instance->params = [];
        $instance->limit = '';
        $instance->order = '';
        return $instance;
    }

    public function where($where, $params = []) {
        $this->where = $where;
        $this->params = $params;
        return $this;
    }

    public function orderBy($order) {
        $this->order = $order;
        return $this;
    }

    public function limit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function get() {
        $sql = "SELECT * FROM {$this->table}";
        if ($this->where) $sql .= " WHERE {$this->where}";
        if ($this->order) $sql .= " ORDER BY {$this->order}";
        if ($this->limit) $sql .= " LIMIT {$this->limit}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($this->params);
        return $stmt->fetchAll();
    }

    public function first() {
        $this->limit(1);
        $result = $this->get();
        return $result ? $result[0] : null;
    }

    public function insert(array $data) {
        $fields = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$this->table} ($fields) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }

    public function update(array $data) {
        $set = implode(', ', array_map(fn($k) => "$k = ?", array_keys($data)));
        $sql = "UPDATE {$this->table} SET $set";
        if ($this->where) $sql .= " WHERE {$this->where}";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_merge(array_values($data), $this->params));
    }

    public function delete() {
        $sql = "DELETE FROM {$this->table}";
        if ($this->where) $sql .= " WHERE {$this->where}";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($this->params);
    }

    // Custom query helpers
    public static function query($sql, $params = []) {
        $instance = self::getInstance();
        $stmt = $instance->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public static function fetchAll($sql, $params = []) {
        return self::query($sql, $params)->fetchAll();
    }

    public static function fetch($sql, $params = []) {
        return self::query($sql, $params)->fetch();
    }

    // Transaction helpers
    public static function beginTransaction() {
        self::getInstance()->pdo->beginTransaction();
    }
    public static function commit() {
        self::getInstance()->pdo->commit();
    }
    public static function rollBack() {
        self::getInstance()->pdo->rollBack();
    }

    // Get raw PDO if needed
    public static function pdo() {
        return self::getInstance()->pdo;
    }
} 