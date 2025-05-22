<?php
namespace App\Models;

use App\Helpers\DBHelper;

class Project {
    protected $table = 'projects';
    protected $prefix = 'pf_';

    public function create($data) {
        return DBHelper::table($this->prefix . $this->table)
            ->insert($data);
    }

    public function getAll() {
        return DBHelper::table($this->prefix . $this->table)->get();
    }

    public function findById($id) {
        return DBHelper::table($this->prefix . $this->table)
            ->where('id = ?', [$id])
            ->first();
    }

    public function updateById($id, $data) {
        return DBHelper::table($this->prefix . $this->table)
            ->where('id = ?', [$id])
            ->update($data);
    }

    public function deleteById($id) {
        return DBHelper::table($this->prefix . $this->table)
            ->where('id = ?', [$id])
            ->delete();
    }
} 