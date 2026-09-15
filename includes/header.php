<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($description ?? 'Aquarium Les Jardins de Nérée à Néréapolis : plus de 3 000 animaux, 40 bassins et une immersion VR à 360°.') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&family=Lemon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= isset($titre) ? htmlspecialchars($titre) . ' — ' : '' ?>Les Jardins de Nérée</title>
</head>

<body>
    <a href="#contenu" class="skip-link">Aller au contenu principal</a>
    <header>
            <nav class="conteneur" aria-label="Navigation principale">
            <?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
            <?php $liens = [
                    'billetterie.php' => 'Billetterie',
                    'animaux.php' => 'Nos animaux',
                    'infos-pratiques.php' => 'Informations pratiques',
                ];?>
                <a href="/index.php">
                    <div class="marque">
                        <img src="/assets/img/logo.jpg" class="logo" width="128" height="128" alt="jeton aux couleurs de l'aquarium, bleu et blanc, avec un poisson au premier plan">
                        <div class="marque-texte">
                            <span class="marque-nom">Les Jardins de Nérée</span>
                            <span class="marque-baseline">Une promenade dans les mondes marins</span>
                        </div>
                    </div>
                </a>

                <button type="button" class="nav-burger" aria-expanded="false" aria-controls="nav-liens" aria-label="Ouvrir le menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="nav-liens" id="nav-liens">
                    <?php foreach ($liens as $fichier => $libelle): ?>
                        <a href="/<?= $fichier ?>" <?= $page === $fichier ? 'aria-current="page"' : '' ?>><?= htmlspecialchars($libelle) ?></a>
                    <?php endforeach; ?>
                    <a href="/billetterie.php" class="nav-btn">Réserver</a>
                </div>
            </nav>
            <script src="/assets/js/menu.js" defer></script>
    </header>
    
            