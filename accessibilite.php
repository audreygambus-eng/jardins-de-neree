<?php
require_once __DIR__ . '/config.php';

$titre = 'Déclaration d\'accessibilité';
require __DIR__ . '/includes/header.php';
?>

<main id="contenu" class="page-texte">
    <h1>Déclaration d'accessibilité</h1>

    <section class="themes-accessibilite">
        <h2>Engagement</h2>
        <p>L'aquarium les Jardins de Nérée s'engage à rendre son site accessible conformément à l’article 47 de la loi n°2005-102 du 11 février 2005. Cette déclaration d’accessibilité s’applique au site Les Jardins de Nérée, accessible à l'adresse <a href="https://audrey.alwaysdata.net">audrey.alwaysdata.net</a>.</p>
    </section>

    <section class="themes-accessibilite">
        <h2>État de conformité</h2>
        <p>Le site est partiellement conforme avec le Référentiel Général d’Amélioration de l’Accessibilité (RGAA), version 4.1.2 en raison des non-conformités énumérées ci-dessous.</p>
        <h3>Résultats des tests</h3>
        <ul>
            <li>Un audit automatisé rapporte 100/100, mais cet outil ne couvre qu'une partie des critères RGAA</li>
            <li>Audit RGAA complet non réalisé</li>
            <li>Tests avec un lecteur d'écran non effectués</li>
            <li>Navigation au clavier non vérifiée exhaustivement</li>
            <li>Un seul navigateur testé</li>
        </ul>
    </section>

    <section class="themes-accessibilite">
        <h2>Les mesures adoptées</h2>
        <ul>
            <li>Une hiérarchie de titres respectée</li>
            <li>Des textes alternatifs sur les images</li>
            <li>Un langage adapté à un public francophone</li>
            <li>Un lien d'évitement pour accéder directement aux zones de contenu</li>
            <li>Des indications destinées aux lecteurs d'écran, invisibles à l'écran</li>
            <li>Les alertes flash avec information pour les lecteurs d'écran de l'apparition d'un message important</li>
            <li>L'indication de l'élément actif pour les lecteurs d'écran</li>
            <li>Le nommage des champs pour les lecteurs d'écran</li>
        </ul>
    </section>

    <section class="themes-accessibilite">
        <h2>Établissement de cette déclaration d’accessibilité</h2>
        <p>Cette déclaration a été établie le 15/09/2026.</p>
        <h3>Technologies utilisées pour la réalisation du site</h3>
        <ul>
            <li>HTML 5</li>
            <li>CSS</li>
            <li>JavaScript</li>
        </ul>
        <h3>Environnement de test</h3>
        <p>Les vérifications de restitution de contenus ont été réalisées sur la base de la combinaison fournie par la base de référence du RGAA, avec les versions suivantes : Google Chrome Version 152.0.7977.83 (Build officiel) (64 bits).</p>
        <p>Outils pour évaluer l’accessibilité :</p>
        <ul>
            <li>Lighthouse</li>
            <li>validator.w3.org</li>
        </ul>
        <h3>Pages du site ayant fait l’objet de la vérification de conformité</h3>
        <ul>
            <li>Accueil</li>
            <li>Billetterie</li>
            <li>Nos animaux</li>
            <li>Informations pratiques</li>
            <li>Confirmation de réservation</li>
            <li>Accessibilité</li>
            <li>Mentions légales</li>
            <li>CGV</li>
        </ul>
    </section>

    <section class="themes-accessibilite">
        <h2>Retour d’information et contact</h2>
        <p>En vertu de l’article 11 de la loi de février 2005 : « la personne handicapée a droit à la compensation des conséquences de son handicap, quels que soient l’origine et la nature de sa déficience, son âge ou son mode de vie. »</p>
        <p>L'aquarium s’engage à prendre les moyens nécessaires afin de donner accès, dans un délai raisonnable, aux informations et fonctionnalités recherchées par la personne handicapée, que le contenu fasse l’objet d’une dérogation ou non. Toutefois, nous invitons les personnes qui rencontreraient des difficultés à la contacter via l’adresse mail <strong>lesjardinsdeneree@mail.com</strong> afin qu’une assistance puisse être apportée (alternative accessible, information et contenu donnés sous une autre forme).</p>
    </section>

    <section class="themes-accessibilite">
        <h2>Voies de recours</h2>
        <p>Si vous constatez un défaut d’accessibilité vous empêchant d’accéder à un contenu ou une fonctionnalité du site, que vous nous le signalez et que vous ne parvenez pas à obtenir une réponse de notre part, vous êtes en droit de faire parvenir vos doléances ou une demande de saisine au Défenseur des droits.</p>
        <p>Plusieurs moyens sont à votre disposition :</p>
        <ul>
            <li><a href="https://formulaire.defenseurdesdroits.fr/formulaire_saisine/"><strong>Un formulaire de contact</strong></a></li>
            <li><a href="https://www.defenseurdesdroits.fr/carte-des-delegues"><strong>La liste du ou des délégués de votre région avec leurs informations de contact direct</strong></a></li>
            <li>Un numéro de téléphone : 09 69 39 00 00</li>
            <li>Une adresse postale (courrier gratuit, sans affranchissement) : Le Défenseur des droits, Libre réponse 71120, 75342 Paris CEDEX 07</li>
        </ul>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>