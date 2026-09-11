<?php
require_once __DIR__ . '/src/Autoloader.php';
Autoloader::register();

$titre = 'Billetterie';
$tarifs = Tarif::findAll();
$creneaux = Creneau::findDisponibles();
$jours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
$mois  = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
          'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

function dateFr(string $date, array $jours, array $mois): string
{
    $t = strtotime($date);
    return $jours[date('w', $t)] . ' ' . date('j', $t) . ' ' . $mois[date('n', $t)] . ' ' . date('Y', $t);
}

$parJour = [];
foreach ($creneaux as $creneau) {
    $jour = substr($creneau['date_heure'], 0, 10);
    $parJour[$jour][] = $creneau;
}

require __DIR__ . '/includes/header.php';
?>

<main>
    <h1>Billetterie</h1>
    <section class="billetterie-intro">
        <h2>Comment ça marche ?</h2>
        <ol>
            <li>Choisissez votre billet parmi les catégories ci-dessous</li>
            <li>Sélectionnez votre tarif et votre date de visite</li>
            <li>Validez et téléchargez votre référence de réservation</li>
            <li>Le jour de votre visite, présentez simplement cette référence au guichet pour le règlement</li>
        </ol>
        <p>Pour profiter pleinement de votre visite et garantir vos places, nous vous recommandons de réserver vos billets en ligne à l'avance.</p>
        <p>Avant de venir, pensez également à consulter nos <a href="/infos-pratiques.php">informations pratiques</a>.</p>
    </section>
    <div class="tarifs">
        <?php foreach ($tarifs as $tarif) : ?>
            <article class="tarif">
                <?php if (!empty($tarif['image'])): ?>
                    <img src="/assets/img/<?= htmlspecialchars($tarif['image']) ?>" alt="">
                <?php endif; ?>
                <h3><?= htmlspecialchars($tarif['libelle']) ?></h3>
                <p><?= htmlspecialchars($tarif['description']) ?></p>
                <p><?= number_format((float) $tarif['prix'], 2, ',', ' ') ?> €</p>
            </article>
        <?php endforeach; ?>
    </div>
    <section class="creneaux">
        <h2>Choisissez votre créneau</h2>
        <?php foreach ($parJour as $jour => $creneauxDuJour): ?>
            <section class="jour">
                <h3><?= dateFr($jour, $jours, $mois) ?></h3>
                <?php foreach ($creneauxDuJour as $creneau): ?>
                    <?php $complet = $creneau['places_visite'] <= 0; ?>
                    <label class="creneau <?= $complet ? 'creneau--complet' : '' ?>">
                        <input type="radio" name="creneau_id" value="<?= $creneau['id'] ?>" <?= $complet ? 'disabled' : '' ?>>
                        <span class="creneau-heure"><?= date('H\hi', strtotime($creneau['date_heure'])) ?></span>
                        <span class="creneau-places"><?= $creneau['places_visite'] ?> places</span>
                        <span class="creneau-casques"><?= $creneau['places_vr'] ?> casques</span>
                    </label>
                <?php endforeach; ?>
            </section>
        <?php endforeach; ?>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>