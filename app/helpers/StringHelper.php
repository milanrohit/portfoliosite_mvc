<?php
namespace App\Helpers;

class StringHelper {
    public static function sanitize($data) {
        return htmlspecialchars(strip_tags($data));
    }
    public static function toUpper($string) {
        return mb_strtoupper($string);
    }
    public static function toLower($string) {
        return mb_strtolower($string);
    }
    // Add more string functions as needed
} 