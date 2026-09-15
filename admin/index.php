<?php
require_once __DIR__ . '/../config.php';

Auth::exigerConnexion();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'purger')
    {
        Csrf::verifier();
        Auth::exigerRole('ROLE_ADMIN');
        $nb = Reservation::purger();
        $_SESSION['message'] = $nb . ' réservation(s) supprimée(s).';
        header('Location: /admin/index.php');
        exit;
    }
$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

$titre = 'Tableau de bord';
require __DIR__ . '/../includes/header.php';
?>

<main id="contenu" class="admin-page">
    <div class="espace">
        <h1>Tableau de bord</h1>
        <?php if ($message !== ''): ?>
            <p class="message" role="status"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <p>Connecté en tant que <?= htmlspecialchars(Auth::utilisateur()['email']) ?></p>

        <ul>
            <li><a href="/admin/recherche.php" class="actions">Rechercher une réservation</a></li>

            <?php if (Auth::aRole('ROLE_ADMIN')): ?>
                <li><a href="/admin/creneaux.php" class="actions">Gérer les créneaux</a></li>
            <?php endif; ?>
        </ul>
        <?php if (Auth::aRole('ROLE_ADMIN')): ?>       
            <section class="admin-maintenance">
                <h2>Maintenance</h2>
                    <form method="post" action="/admin/index.php">
                        <?= Csrf::champ() ?>
                        <input type="hidden" name="action" value="purger">
                        <button type="submit" class="btn btn-plein"
                        onclick="return confirm('Supprimer les réservations de plus de 30 jours ?')">Purger les anciennes réservations</button>
                    </form>
            </section>
        <?php endif; ?>

        <a href="/deconnexion.php" class="btn btn-plein">Se déconnecter</a>
    </div>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>