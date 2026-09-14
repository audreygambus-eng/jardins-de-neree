<?php

class Utilisateur
{
    public static function findByEmail(string $email): ?array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT id, email, mot_de_passe, role
                FROM utilisateur
                WHERE email = :email';

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch() ?: null;
    }
}