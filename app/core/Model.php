<?php
namespace App\Core;

class Model {
    protected $db;
    public function __construct() {
        $this->db = new \App\Core\Database();
    }
} 