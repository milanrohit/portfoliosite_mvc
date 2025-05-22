<?php
namespace App\Core;

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();
        $controllerClass = 'App\\Controllers\\' . ucfirst($url[0]) . 'Controller';
        if (class_exists($controllerClass)) {
            $this->controller = $controllerClass;
            unset($url[0]);
        } else {
            $this->controller = 'App\\Controllers\\HomeController';
        }
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return ['home'];
    }
} 