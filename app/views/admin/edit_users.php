<h2>Modifier utilisateur : <?= $user['nom_agent'] ?></h2>

<form method="POST" action="index.php?action=admin_edit_user_submit">

    <input type="hidden" name="id_agent" value="<?= $user['id_agent'] ?>">

    <label>Nom :</label>
    <input type="text" name="nom_agent" value="<?= $user['nom_agent'] ?>" required>

    <label>Prénom :</label>
    <input type="text" name="prenom_agent" value="<?= $user['prenom_agent'] ?>">

    <label>Rôle :</label>
    <select name="role">
        <option value="admin"   <?= $user['role']=="admin"?"selected":"" ?>>Administrateur</option>
        <option value="agent"   <?= $user['role']=="agent"?"selected":"" ?>>Agent</option>
        <option value="auditeur"<?= $user['role']=="auditeur"?"selected":"" ?>>Auditeur</option>
        <option value="moe"     <?= $user['role']=="moe"?"selected":"" ?>>MOE</option>
        <option value="moa"     <?= $user['role']=="moa"?"selected":"" ?>>MOA</option>
        <option value="lecteur" <?= $user['role']=="lecteur"?"selected":"" ?>>Lecteur</option>
    </select>

    <button type="submit">Enregistrer</button>
</form>