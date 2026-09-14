<?php
require_once __DIR__ . '/../config.php';

Auth::exigerRole('ROLE_ADMIN');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = (int) ($_POST['id'] ?? 0);

    if ($action === 'basculer' && $id > 0) {
        Creneau::basculerActif($id);
    }

    header('Location: /admin/creneaux.php');
    exit;
}

$creneaux = Creneau::findTous();

$titre = 'Gestion des créneaux';
require __DIR__ . '/../includes/header.php';
?>

<main class="admin-page">
    <h1>Gestion des créneaux</h1>

    <table>
        <thead>
            <tr>
                <th>Date et heure</th>
                <th>Visite</th>
                <th>Casques VR</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($creneaux as $creneau): ?>
                <?php
                    $nbVisite = $creneau['capacite_visite'] - $creneau['places_visite'];
                    $nbVr = $creneau['capacite_vr'] - $creneau['places_vr'];
                ?>
                <tr>
                    <td>
                        <?= Dates::enFrancais($creneau['date_heure']) ?>
                        à <?= date('H\hi', strtotime($creneau['date_heure'])) ?>
                    </td>
                    <td><?= $nbVisite ?> / <?= $creneau['capacite_visite'] ?></td>
                    <td><?= $nbVr ?> / <?= $creneau['capacite_vr'] ?></td>
                    <td><?= $creneau['actif'] ? 'Ouvert' : 'Fermé' ?></td>
                    <td>
                        <form method="post" action="/admin/creneaux.php">
                            <input type="hidden" name="action" value="basculer">
                            <input type="hidden" name="id" value="<?= $creneau['id'] ?>">
                            <button type="submit" class="btn btn-plein">
                                <?= $creneau['actif'] ? 'Fermer' : 'Rouvrir' ?>
                            </button>
                        </form>
                        <a href="/admin/reservations.php?creneau=<?= $creneau['id'] ?>">Voir les réservations</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>