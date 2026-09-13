<?php
require_once __DIR__ . '/src/Autoloader.php';
Autoloader::register();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}