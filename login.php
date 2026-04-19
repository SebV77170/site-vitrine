<!DOCTYPE HTML>
<html lang="fr-FR">
<?php
include('actions/db.php');
include('includes/auth.php');

$lineheight = 'uneligne';
$src = 'image/PictoContact.gif';
$alt = 'un oiseau au telephone';
$titre = 'Connexion administrateur';
$page = 0;

$error = null;

if (isset($_GET['logout'])) {
    logout_admin();
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login_admin($db, $pseudo, $password)) {
        header('Location: ouverture.php');
        exit;
    }

    $error = 'Connexion refusée. Le compte doit être administrateur (admin = 2).';
}

include('includes/head.php');
?>
<body>
<?php include('includes/header.php'); ?>
<?php include('includes/nav.php'); ?>

<article class="doc">
    <h1>Espace administrateur</h1>

    <?php if (is_admin_logged()): ?>
        <p class="auth-ok">Vous êtes connecté en tant que <strong><?= htmlspecialchars((string) $_SESSION['admin_user']['pseudo']) ?></strong>.</p>
        <p><a href="ouverture.php">Aller à la gestion des alertes</a> • <a href="login.php?logout=1">Se déconnecter</a></p>
    <?php else: ?>
        <?php if ($error !== null): ?>
            <p class="auth-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form class="login-form" method="post" action="login.php">
            <label for="pseudo">Pseudo</label>
            <input id="pseudo" name="pseudo" type="text" required>

            <label for="password">Mot de passe</label>
            <input id="password" name="password" type="password" required>

            <button type="submit">Se connecter</button>
        </form>
    <?php endif; ?>
</article>

<?php
$linesupp = null;
include('includes/footer.php');
?>
</html>
