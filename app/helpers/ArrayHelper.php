<?php
namespace App\Helpers;

class ArrayHelper {
    public static function isAssoc(array $arr) {
        if ([] === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
    public static function flatten(array $array) {
        $result = [];
        array_walk_recursive($array, function($a) use (&$result) { $result[] = $a; });
        return $result;
    }
    // Add more array functions as needed
} 