<?php
require_once __DIR__ . '/config.php';

$titre = 'Informations pratiques';
require __DIR__ . '/includes/header.php';
?>

<main>
    <div class="conteneur-infos">
        <section class="page-coordonnees">
                <div class="localisation">
                    <span class="boxicons--location-pin"></span>
                    <h2 class="texte-infos">Nous trouver</h2>
                </div>
                <div class="texte-localisation">
                    <p>Allée de l’Odyssée – 49 244 Néréapolis</p>
                    <p>Accès depuis la D610, direction Millegrande.<br>Parking visiteurs à proximité de l’entrée.</p>
                </div>
                <div class="carte-adresse">
                    <img src="/assets/img/carte.png" alt="">
                </div>
        </section>
        <section class="informations">
            <div class="conteneur">
                <div class="generalites">
                    <h1>Informations pratiques</h1>
                    <p>Notre aquarium est ouvert  tous les jours de 10h à 18h.</p>
                    <p><span class="fluent--important-16-regular"aria-hidden="true"></span>La billetterie est accessible jusqu’à 17h.</p>
                    <span class="sr-only">Important : </span>
                </div>
                <div class="specificites">
                    <p class="specificite-activite">Pour la visite seule :</p>
                    <p>Il n’est pas obligatoire de réserver un créneau mais la réservation des billets en ligne est toutefois conseillée afin d’éviter toute attente sur place.</p>
                    <p class="specificite-activite">Pour l’activité en VR :</p>
                    <p>La quantité de casques étant limitée, la réservation est obligatoire pour cette activité.</p>
                </div>
                <div class="complements">
                    <p>Prévoyez environ une heure de visite et une demi-heure supplémentaire si vous réservez l’activité en VR.</p>
                    <p>Notre boutique souvenirs est ouverte de 10h à 17h.</p>
                    <p>L’espace restauration vous accueille de 10h à 18h.</p>
                    <p><span class="fluent--important-16-regular" aria-hidden="true"></span>Les mineurs de moins de 16 ans doivent être accompagnés par une personne majeure.</p>
                    <span class="sr-only">Important : </span>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>