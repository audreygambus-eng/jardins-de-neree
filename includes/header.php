<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= isset($titre) ? htmlspecialchars($titre) . ' — ' : '' ?>Les Jardins de Nérée</title>
</head>

<body>
    <header>
        <?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
        <?php $liens = [
                'billetterie.php' => 'Billetterie',
                'animaux.php' => 'Nos animaux',
                'infos-pratiques.php' => 'Informations pratiques',
            ];?>
        <nav aria-label="Navigation principale">
            <a href="/index.php">
                <img src="/assets/img/logo.jpg" alt="jeton aux couleurs de l'aquarium, bleu et blanc, avec un poisson au premier plan">
                <span>Les Jardins de Nérée</span>
                <span>Une promenade dans les mondes marins</span>
            </a>
        <?php foreach ($liens as $fichier => $libelle): ?>
            <a href="/<?= $fichier ?>" <?= $page === $fichier ? 'aria-current="page"' : '' ?>><?= htmlspecialchars($libelle) ?></a>
        <?php endforeach; ?>
        <a href="/billetterie.php" class="btn">Réserver</a>
        </nav>
    </header>
    
            