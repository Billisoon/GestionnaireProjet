<h2>Ajouter un utilisateur</h2>

<form method="POST" action="index.php?action=admin_add_user_submit">

    <label>Nom :</label>
    <input type="text" name="nom_agent" required>

    <label>Prénom :</label>
    <input type="text" name="prenom_agent">

    <label>Mot de passe :</label>
    <input type="password" name="mot_de_passe" required>

    <label>Rôle :</label>
    <select name="role" required>
        <option value="admin">Administrateur</option>
        <option value="agent">Agent</option>
        <option value="auditeur">Auditeur</option>
        <option value="moe">MOE</option>
        <option value="moa">MOA</option>
        <option value="lecteur">Lecteur</option>
    </select>

    <button type="submit">Créer</button>

</form>