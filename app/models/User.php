<?php
namespace App\Models;

use App\Helpers\DBHelper;

class User {
    protected $table = 'users';
    protected $prefix = 'pf_';

    public function create($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return DBHelper::table($this->prefix . $this->table)
            ->insert([
                'username' => $username,
                'password' => $hash
            ]);
    }

    public function findByUsername($username) {
        return DBHelper::table($this->prefix . $this->table)
            ->where('username = ?', [$username])
            ->first();
    }

    public function getAll() {
        return DBHelper::table($this->prefix . $this->table)->get();
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