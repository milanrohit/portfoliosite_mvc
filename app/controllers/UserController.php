<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Helpers\RedirectHelper;
use App\Helpers\StringHelper;

class UserController extends Controller {
    protected $userModel;
    public function __construct() {
        $this->userModel = new User();
    }
    public function index() {
        $users = $this->userModel->getAll();
        $data = ['title' => 'User List', 'users' => $users];
        $this->view('user/index', $data);
    }
    public function create() {
        $data = ['title' => 'Create User'];
        $this->view('user/create', $data);
    }
    public function store() {
        $username = StringHelper::sanitize($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        if ($username && $password) {
            $this->userModel->create($username, $password);
            RedirectHelper::redirect('/user/index');
        } else {
            RedirectHelper::redirect('/user/create');
        }
    }
    public function edit($id) {
        $user = $this->userModel->findByUsername($id);
        $data = ['title' => 'Edit User', 'user' => $user];
        $this->view('user/edit', $data);
    }
    public function update($id) {
        $username = StringHelper::sanitize($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $data = ['username' => $username];
        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $this->userModel->updateById($id, $data);
        RedirectHelper::redirect('/user/index');
    }
    public function delete($id) {
        $this->userModel->deleteById($id);
        RedirectHelper::redirect('/user/index');
    }
} 