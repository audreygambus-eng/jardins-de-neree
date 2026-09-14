<?php

class Auth
{
    public static function utilisateur(): ?array
    {
        return $_SESSION['utilisateur'] ?? null;
    }

    public static function estConnecte(): bool
    {
        return self::utilisateur() !== null;
    }

    public static function aRole(string $role): bool
    {
        $u = self::utilisateur();
        return $u !== null && $u['role'] === $role;
    }

    public static function exigerConnexion(): void
    {
        if (!self::estConnecte()) {
            header('Location: /connexion.php');
            exit;
        }
    }

    public static function exigerRole(string $role): void
    {
        self::exigerConnexion();

        if (!self::aRole($role)) {
            http_response_code(403);
            exit('Accès refusé.');
        }
    }
}