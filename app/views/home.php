<?php
session_start();

if (!isset($_SESSION["id_agent"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="public/style_green.css">
<?php
session_start();

if (!isset($_SESSION['id_agent'])) {
    header("Location: index.php?action=login");
    exit();
}

$nom = $_SESSION['nom_agent'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="app/public/style_green.css">
</head>
<body>

<header class="navbar">
    <div class="navbar-left">
        <div class="burger" id="burger">&#9776;</div>
        <a href="#" class="logo">Gestionnaire de projet</a>
    </div>

    <div class="navbar-center">
        <input type="text" class="search-bar" placeholder="Rechercher...">
    </div>

    <div class="navbar-right">
        <span class="btn-profile"><?= htmlspecialchars($nom) ?></span>
        <a href="index.php?action=logout" class="btn-profile">Déconnexion</a>
    </div>
    <p></p>
</header>

<main class="main-content">
    <h1>Bienvenue, <?= htmlspecialchars($nom) ?></h1>

    <div class="cards-container">
        <div class="card">
            <h3>Info générale</h3>
            <p>Cette page est accessible aux agents connectés.</p>
        </div>
    </div>
</main>

</body>
</html>