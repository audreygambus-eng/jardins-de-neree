<?php
require_once __DIR__ . '/../config.php';

Auth::exigerConnexion();

$terme = trim($_GET['q'] ?? '');
$resultats = [];

if ($terme !== '') {
    $resultats = Reservation::rechercher($terme);
}

$titre = 'Rechercher une réservation';
require __DIR__ . '/../includes/header.php';
?>

<main id="contenu" class="admin-page">
    <h1>Rechercher une réservation</h1>

    <form method="get" action="/admin/recherche.php" class="form-recherche">
        <label>
            Nom ou e-mail du visiteur
            <input type="search" name="q" value="<?= htmlspecialchars($terme) ?>" required>
        </label>
        <button type="submit" class="btn btn-plein">Rechercher</button>
    </form>

    <?php if ($terme !== ''): ?>
        <?php if (empty($resultats)): ?>
            <p>Aucune réservation ne correspond à cette recherche.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Créneau</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultats as $r): ?>
                        <tr>
                            <td><?= htmlspecialchars($r['reference']) ?></td>
                            <td><?= htmlspecialchars($r['nom']) ?></td>
                            <td><?= htmlspecialchars($r['email']) ?></td>
                            <td><?= Dates::enFrancais($r['date_heure']) ?> à <?= date('H\hi', strtotime($r['date_heure'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
