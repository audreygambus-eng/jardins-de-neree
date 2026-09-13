<?php
require_once __DIR__ . '/config.php';

require __DIR__ . '/includes/header.php';
?>

<main>
    <section class="hero">
        <div class="conteneur">
            <p class="hero-pastille">Ouvert tous les jours de 10h à 18h</p>
            <h1>Une promenade dans les mondes marins</h1>
            <p class="hero-texte">
                Plus de 3 000 animaux et 40 bassins à découvrir, à Néréapolis.
                Comptez une heure de visite.
            </p>
            <div class="hero-actions">
                <a href="/billetterie.php" class="btn">Réserver un billet</a>
                <a href="/infos-pratiques.php" class="btn">Préparer ma visite</a>
            </div>
        </div>
    </section>

    <section class="animaux">
        <div class="conteneur">
            <h2>Nos animaux</h2>
            <p>40 bassins, des Méditerranées côtières aux grands fonds</p>
            <div class="animaux-grille">
                <article class="carte">
                    <img src="/assets/img/requin.jpg" alt="">
                    <h3>Requins et mérous</h3>
                </article>
                <article class="carte">
                    <img src="/assets/img/poisson-archer.jpg" alt="">
                    <h3>Poisson-archers et crabes</h3>
                </article>
                <article class="carte">
                    <img src="/assets/img/meduse.jpg" alt="">
                    <h3>Méduses</h3>
                </article>
                <article class="carte">
                    <img src="/assets/img/raie.jpg" alt="">
                    <h3>Raies</h3>
                </article>
            </div>
        </div>
    </section>
    <section class="vr">
        <div class="vr-texte">
            <p class="vr-pastille">Nouveauté</p>
            <h2>Et après la visite, plongez à 360°</h2>
            <p>
                Une immersion virtuelle à la rencontre d'un océan peuplé de merveilles.
                Les casques sont en quantité limitée : pensez à réserver votre session
                en même temps que vos billets.
            </p>
            <a href="/billetterie.php" class="btn">Réserver un casque</a>
        </div>
        <div class="vr-image"></div>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>