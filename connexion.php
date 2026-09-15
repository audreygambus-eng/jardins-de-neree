<?php
require_once __DIR__ . '/config.php';

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Csrf::verifier();
    $email = trim($_POST['email'] ?? '');
    $motDePasse = $_POST['mot_de_passe'] ?? '';

    $utilisateur = Utilisateur::findByEmail($email);

    if ($utilisateur !== null && password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
        session_regenerate_id(true);

        $_SESSION['utilisateur'] = [
            'id'    => $utilisateur['id'],
            'email' => $utilisateur['email'],
            'role'  => $utilisateur['role'],
        ];

        header('Location: /admin/index.php');
        exit;

    } else {
        $erreur = 'Identifiants incorrects.';
    }
}

$titre = 'Connexion';
require __DIR__ . '/includes/header.php';
?>

<main id="contenu">
    <h1>Connexion</h1>

    <?php if ($erreur !== ''): ?>
        <p class="erreurs" role="alert"><?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>

    <form method="post" action="/connexion.php">
        <?= Csrf::champ() ?>
        <label> E-mail
            <input type="email" name="email" required maxlength="255">
        </label>
        <label> Mot de passe
            <input type="password" name="mot_de_passe">
        </label>
        <button type="submit" class="btn btn-plein">Se connecter</button>
    </form>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>