<?php
namespace App\Core;

class Controller {
    public function model($model) {
        $modelClass = 'App\\Models\\' . $model;
        return new $modelClass();
    }

    public function view($view, $data = []) {
        // Views are still PHP files, so we use a simple loader
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "View not found: $viewPath";
        }
    }
} 