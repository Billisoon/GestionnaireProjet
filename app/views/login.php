<?php
$error = $error_message ?? "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="app/public/style_green.css">
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">
        <h1 class="title">Connexion</h1>
        <p class="subtitle">Accédez à votre espace</p>

        <?php if (!empty($error)) : ?>
            <div class="alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=loginSubmit">
            <label class="label">Nom d'agent</label>
            <input type="text" name="nom_agent" class="input-field" required>

            <label class="label">Mot de passe</label>
            <input type="password" name="mot_de_passe" required>

            <button type="submit" class="btn-green">Se connecter</button>
        </form>
    </div>
</div>

</body>
</html>