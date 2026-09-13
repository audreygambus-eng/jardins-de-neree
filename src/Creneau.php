<?php

class Creneau
{
    public static function findDisponibles() : array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT c.id,
                        c.date_heure,
                        c.capacite_visite,
                        c.capacite_vr,
                        c.capacite_visite - COALESCE(SUM(rt.quantite * t.compte_visite), 0) AS places_visite,
                        c.capacite_vr - COALESCE(SUM(rt.quantite * t.compte_vr), 0) AS places_vr
                FROM creneau c
                LEFT JOIN reservation r ON r.creneau_id = c.id
                LEFT JOIN reservation_tarif rt ON rt.reservation_id = r.id
                LEFT JOIN tarif t ON t.id = rt.tarif_id
                WHERE c.actif = 1
                AND c.date_heure > NOW()
                GROUP BY c.id
                ORDER BY c.date_heure';
        return $pdo->query($sql)->fetchAll();
    }

    public static function findById(int $id): ?array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT c.id,
                       c.date_heure,
                       c.capacite_visite - COALESCE(SUM(rt.quantite * t.compte_visite), 0) AS places_visite,
                       c.capacite_vr - COALESCE(SUM(rt.quantite * t.compte_vr), 0) AS places_vr
                FROM creneau c
                LEFT JOIN reservation r ON r.creneau_id = c.id
                LEFT JOIN reservation_tarif rt ON rt.reservation_id = r.id
                LEFT JOIN tarif t ON t.id = rt.tarif_id
                WHERE c.id = :id
                AND c.actif = 1
                AND c.date_heure > NOW()
                GROUP BY c.id';

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch() ?: null;
    }

    public static function findTous(): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT c.id,
                       c.date_heure,
                       c.actif,
                       c.capacite_visite,
                       c.capacite_vr,
                       c.capacite_visite - COALESCE(SUM(rt.quantite * t.compte_visite), 0) AS places_visite,
                       c.capacite_vr - COALESCE(SUM(rt.quantite * t.compte_vr), 0) AS places_vr
                FROM creneau c
                LEFT JOIN reservation r ON r.creneau_id = c.id
                LEFT JOIN reservation_tarif rt ON rt.reservation_id = r.id
                LEFT JOIN tarif t ON t.id = rt.tarif_id
                GROUP BY c.id
                ORDER BY c.date_heure desc';
        
        return $pdo->query($sql)->fetchAll();
    }
}