<?php
function redirect($url) {
    header('Location: ' . $url);
    exit;
}
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
} 