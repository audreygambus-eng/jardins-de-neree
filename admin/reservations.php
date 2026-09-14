<?php
require_once __DIR__ . '/../config.php';

Auth::exigerRole('ROLE_ADMIN');

$creneauId = (int) ($_GET['creneau'] ?? 0);
$creneau = Creneau::findById($creneauId);
$reservations = Reservation::findParCreneau($creneauId);

$titre = 'Réservations du créneau';
require __DIR__ . '/../includes/header.php';
?>

<main class="admin-page">
    <h1>Réservations du créneau</h1>

    <p><a href="/admin/creneaux.php">Retour à la liste des créneaux</a></p>

    <?php if (empty($reservations)): ?>
        <p>Aucune réservation sur ce créneau.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Billets</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['reference']) ?></td>
                        <td><?= htmlspecialchars($r['nom']) ?></td>
                        <td><?= htmlspecialchars($r['email']) ?></td>
                        <td><?= $r['nb_billets'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>