<?php
function redirect($url) {
    header('Location: ' . $url);
    exit;
}
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

// Debugging helper functions
function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function dump($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function debug_log($data, $file = 'debug.log') {
    $output = print_r($data, true);
    file_put_contents($file, date('Y-m-d H:i:s') . " - " . $output . "\n", FILE_APPEND);
} 
