<?php
require_once __DIR__ . '/src/Autoloader.php';
Autoloader::register();

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure'   => isset($_SERVER['HTTPS']),
    ]);
    session_start();
}