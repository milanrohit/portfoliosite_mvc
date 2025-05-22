<?php
namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller {
    public function dashboard() {
        $data = ['title' => 'Admin Dashboard'];
        $this->view('admin/dashboard', $data);
    }
} 