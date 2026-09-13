<?php
require_once __DIR__ . '/../config.php';

Auth::exigerRole('ROLE_ADMIN');

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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>