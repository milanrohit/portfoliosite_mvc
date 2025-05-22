<?php
namespace App\Models;

use App\Core\Model;
use App\Core\Crud;

class User extends Model {
    protected $crud;
    protected $table = 'users';
    protected $prefix = 'pf_';
    public function __construct() {
        parent::__construct();
        $this->crud = new Crud($this->db->pdo, $this->prefix);
    }
    public function create($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->crud->create($this->table, [
            'username' => $username,
            'password' => $hash
        ]);
    }
    public function findByUsername($username) {
        $result = $this->crud->read($this->table, 'username = ?', [$username]);
        return $result ? $result[0] : null;
    }
    public function getAll() {
        return $this->crud->read($this->table);
    }
    public function updateById($id, $data) {
        return $this->crud->update($this->table, $data, 'id = ?', [$id]);
    }
    public function deleteById($id) {
        return $this->crud->delete($this->table, 'id = ?', [$id]);
    }
} 