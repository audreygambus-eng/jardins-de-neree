<?php
require_once __DIR__ . '/src/Autoloader.php';
Autoloader::register();

$reference = $_GET['ref'] ?? '';
$reservation = Reservation::findByReference($reference);

if ($reservation === null) {
    http_response_code(404);
    $titre = 'Réservation introuvable';
} else {
    $titre = 'Votre réservation';
    $detail = Reservation::findDetail($reference);
    $total = 0;
    foreach ($detail as $ligne) {
        $total += $ligne['quantite'] * $ligne['prix'];
    }
}

require __DIR__ . '/includes/header.php';
?>

<main>
    <?php if ($reservation === null) : ?>

        <h1>Réservation introuvable</h1>
        <p>Cette référence ne correspond à aucune réservation</p>
        <a href="/billetterie.php" class="btn">Retour à la billetterie</a>
    
    <?php else: ?>

        <h1>Votre réservation</h1>
        <div class="entete-billet">
            <img src="/assets/img/logo.jpg" alt="jeton aux couleurs de l'aquarium, bleu et blanc, avec un poisson au premier plan">
            <h2>Les jardins de Nérée</h2>
            <p>Aquarium - Néréapolis</p>
        </div>
        <div class="corps-billet">
            <p class="billet-label">Référence de réservation</p>
            <p class="billet-reference"><?= htmlspecialchars($reservation['reference']) ?></p>

            <p>Au nom de <?= htmlspecialchars($reservation['nom']) ?></p>
            <p>Le <?= Dates::enFrancais($reservation['date_heure']) ?> à <?= date('H\hi', strtotime($reservation['date_heure'])) ?></p>

            <ul class="billet-detail">
                <?php foreach ($detail as $ligne): ?>
                    <li>
                        <?= $ligne['quantite'] ?> × <?= htmlspecialchars($ligne['libelle']) ?>
                        — <?= number_format($ligne['quantite'] * $ligne['prix'], 2, ',', ' ') ?> €
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <p class="billet-total">À régler sur place : <?= number_format($total, 2, ',', ' ') ?> €</p>
            <button type="button" class="btn no-print" onclick="window.print()">Enregistrer ma réservation</button>
        </div>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>