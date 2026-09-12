<?php
require_once __DIR__ . '/../src/Autoloader.php';
Autoloader::register();
session_start();

Auth::exigerConnexion();

$titre = 'Tableau de bord';
require __DIR__ . '/../includes/header.php';
?>

<main>
    <h1>Tableau de bord</h1>
    <p>Connecté en tant que <?= htmlspecialchars(Auth::utilisateur()['email']) ?></p>

    <ul>
        <li><a href="/admin/recherche.php">Rechercher une réservation</a></li>

        <?php if (Auth::aRole('ROLE_ADMIN')): ?>
            <li><a href="/admin/creneaux.php">Gérer les créneaux</a></li>
        <?php endif; ?>
    </ul>

    <a href="/deconnexion.php" class="btn">Se déconnecter</a>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>