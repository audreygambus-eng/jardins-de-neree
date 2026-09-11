<?php

require_once __DIR__ . '/src/Autoloader.php';
Autoloader::register();

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /billetterie.php');
    exit;
}

$nom = trim($_POST['nom'] ?? '');
$email = trim($_POST['email'] ?? '');
$creneauId = (int) ($_POST['creneau_id'] ?? 0);
$quantites = $_POST['quantites'] ?? [];
$quantites = array_map('intval', $quantites);
$totalBillets = array_sum($quantites);

$erreurs = [];

if ($nom === '') {
    $erreurs[] = 'Le nom est obligatoire.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'adresse e-mail n'est pas valide.";
}

if ($creneauId === 0) {
    $erreurs[] = 'Veuillez choisir un créneau.';
}

if ($totalBillets <= 0) {
    $erreurs[] = 'Veuillez sélectionner au moins un billet.';
}

$tarifs = Tarif::findAll();

foreach ($tarifs as $tarif) {
    $q = $quantites[$tarif['id']] ?? 0;
    if ($q > 0 && $q < $tarif['quantite_min']) {
        $erreurs[] = "Le tarif « {$tarif['libelle']} » nécessite au moins {$tarif['quantite_min']} billets.";
    }
}

$creneau = Creneau::findById($creneauId);

if ($creneau === null) {
    $erreurs[] = "Le créneau choisi n'est plus disponible.";
} else {
    $placesDemandees = 0;
    $casquesDemandes = 0;

    foreach ($tarifs as $tarif) {
        $q = $quantites[$tarif['id']] ?? 0;
        $placesDemandees += $q * $tarif['compte_visite'];
        $casquesDemandes += $q * $tarif['compte_vr'];
    }

    if ($placesDemandees > $creneau['places_visite']) {
        $erreurs[] = "Il ne reste que {$creneau['places_visite']} places sur ce créneau.";
    }

    if ($casquesDemandes > $creneau['places_vr']) {
        $erreurs[] = "Il ne reste que {$creneau['places_vr']} casques VR sur ce créneau.";
    }
}

if (!empty($erreurs)) {
    $_SESSION['erreurs'] = $erreurs;
    $_SESSION['ancien'] = $_POST;
    header('Location: /billetterie.php');
    exit;
}

$reference = Reservation::creer($nom, $email, $creneauId, $quantites);

header('Location: /confirmation.php?ref=' . urlencode($reference));
exit;