<?php

class Csrf
{
    public static function jeton(): string
    {
        if (empty($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf'];
    }

    public static function champ(): string
    {
        return '<input type="hidden" name="csrf" value="' . self::jeton() . '">';
    }

    public static function verifier(): void
    {
        $recu = $_POST['csrf'] ?? '';

        if (!hash_equals(self::jeton(), $recu)) {
            http_response_code(403);
            exit('Requête invalide.');
        }
    }
}