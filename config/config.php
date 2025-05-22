<?php
// Load environment variables from .env
if (file_exists(__DIR__ . '/../.env')) {
    $env = parse_ini_file(__DIR__ . '/../.env');
    foreach ($env as $key => $value) {
        define(strtoupper($key), $value);
    }
} 