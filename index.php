<?php
// Get the requested URI
$request = $_SERVER['REQUEST_URI'];

// Remove query string if it exists
$request = strtok($request, '?');
// Define routes
switch ($request) {
    case '/':
    case '/home' :
        require __DIR__ . '/views/home.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}