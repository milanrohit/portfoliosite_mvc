<?php
namespace App\Models;

use App\Helpers\DBHelper;

class Blog {
    protected $table = 'blogs';
    protected $prefix = 'pf_';
    const WHERE_ID = 'id = ?';

    public function create($data) {
        return DBHelper::table($this->prefix . $this->table)
            ->insert($data);
    }

    public function getAll() {
        return DBHelper::table($this->prefix . $this->table)->get();
    }

    public function findById($id) {
        return DBHelper::table($this->prefix . $this->table)->where(self::WHERE_ID, [$id])->first();
    }

    public function updateById($id, $data) {
        return DBHelper::table($this->prefix . $this->table)
            ->where(self::WHERE_ID, [$id])
            ->update($data);
    }

    public function deleteById($id) {
        return DBHelper::table($this->prefix . $this->table)
            ->where(self::WHERE_ID, [$id])
            ->delete();
    }
}
