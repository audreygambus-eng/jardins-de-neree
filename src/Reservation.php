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
}