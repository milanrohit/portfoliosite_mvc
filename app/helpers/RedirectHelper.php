<?php
namespace App\Helpers;

class RedirectHelper {
    public static function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
} 