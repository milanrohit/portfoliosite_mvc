<?php
namespace App\Models;

use App\Core\Model;
use App\Core\Crud;

class Project extends Model {
    protected $crud;
    protected $table = 'projects';
    protected $prefix = 'pf_';
    public function __construct() {
        parent::__construct();
        $this->crud = new Crud($this->db->pdo, $this->prefix);
    }
    public function create($data) {
        return $this->crud->create($this->table, $data);
    }
    public function getAll() {
        return $this->crud->read($this->table);
    }
    public function find($id) {
        $result = $this->crud->read($this->table, 'id = ?', [$id]);
        return $result ? $result[0] : null;
    }
    public function updateById($id, $data) {
        return $this->crud->update($this->table, $data, 'id = ?', [$id]);
    }
    public function deleteById($id) {
        return $this->crud->delete($this->table, 'id = ?', [$id]);
    }
} 