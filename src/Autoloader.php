<?php

class Autoloader
{
    public static function register() : void
    {
        spl_autoload_register(function (string $class) {
            $fichier = __DIR__ . '/' . $class . '.php';
            if (file_exists($fichier)) {
                require_once $fichier;
            }
        });
    }
}