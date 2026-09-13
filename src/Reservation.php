<?php

class Reservation
{
    private static function genererReference(): string
    {
        $aleatoire = strtoupper(bin2hex(random_bytes(2)));
        return 'NER-' . date('dm') . '-' . $aleatoire;
    }

    public static function creer(string $nom, string $email, int $creneauId, array $quantites): string
    {
        $pdo = Database::getInstance();
        $reference = self::genererReference();

        $pdo->beginTransaction();

        try {
            $sql = 'INSERT INTO reservation (reference, nom, email, creneau_id)
                    VALUES (:reference, :nom, :email, :creneau_id)';

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'reference'  => $reference,
                'nom'        => $nom,
                'email'      => $email,
                'creneau_id' => $creneauId,
            ]);
            
            $reservationId = (int) $pdo->lastInsertId();

            $sqlDetail = 'INSERT INTO reservation_tarif (reservation_id, tarif_id, quantite)
                          VALUES (:reservation_id, :tarif_id, :quantite)';
            $stmtDetail = $pdo->prepare($sqlDetail);

            foreach ($quantites as $tarifId => $quantite) {
                if ($quantite > 0) {
                    $stmtDetail->execute([
                        'reservation_id' => $reservationId,
                        'tarif_id'       => $tarifId,
                        'quantite'       => $quantite,
                    ]);
                }
            }

            $pdo->commit();
            return $reference;

        } catch (Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
            
    }

    public static function findByReference(string $reference): ?array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT r.reference, r.nom, r.email, r.date_reservation, c.date_heure
                FROM reservation r
                JOIN creneau c ON c.id = r.creneau_id
                WHERE r.reference = :reference';
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['reference' => $reference]);

        return $stmt->fetch() ?: null;
    }

    public static function findDetail(string $reference): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT t.libelle, rt.quantite, t.prix
                FROM reservation r
                JOIN reservation_tarif rt ON rt.reservation_id = r.id
                JOIN tarif t ON t.id = rt.tarif_id
                WHERE r.reference = :reference
                ORDER BY t.id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['reference' => $reference]);

        return $stmt->fetchAll();
    }

    public static function rechercher(string $terme): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT r.reference, r.nom, r.email, c.date_heure
                FROM reservation r
                JOIN creneau c ON c.id = r.creneau_id
                WHERE r.nom LIKE :terme_nom
                    OR r.email LIKE :terme_email
                ORDER BY c.date_heure DESC';

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'terme_nom' => '%' . $terme . '%',
            'terme_email' => '%' . $terme . '%',
        ]);

        return $stmt->fetchAll();
    }
}