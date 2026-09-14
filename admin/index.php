<?php
require_once __DIR__ . '/../config.php';

Auth::exigerConnexion();

$titre = 'Tableau de bord';
require __DIR__ . '/../includes/header.php';
?>

<main class="admin-page">
    <div class="espace">
        <h1>Tableau de bord</h1>
        <p>Connecté en tant que <?= htmlspecialchars(Auth::utilisateur()['email']) ?></p>

        <ul>
            <li><a href="/admin/recherche.php" class="actions">Rechercher une réservation</a></li>

            <?php if (Auth::aRole('ROLE_ADMIN')): ?>
                <li><a href="/admin/creneaux.php" class="actions">Gérer les créneaux</a></li>
            <?php endif; ?>
        </ul>

        <a href="/deconnexion.php" class="btn btn-plein">Se déconnecter</a>
    </div>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>