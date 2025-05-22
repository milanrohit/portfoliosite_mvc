<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller {
    public function index() {
        $data = ['title' => 'Welcome to My Portfolio'];
        $this->view('home/index', $data);
    }
} 