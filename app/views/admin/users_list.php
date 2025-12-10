<h2>Gestion des utilisateurs</h2>

<a href="index.php?action=admin_add_user" class="btn"> Ajouter un utilisateur</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id_agent'] ?></td>
            <td><?= $u['nom_agent'] ?></td>
            <td><?= $u['prenom_agent'] ?></td>
            <td><?= $u['role'] ?></td>

            <td>
                <a href="index.php?action=admin_edit_user&id_agent=<?= $u['id_agent'] ?>">✏ Modifier</a>
                |
                <a href="index.php?action=admin_delete_user&id_agent=<?= $u['id_agent'] ?>"
                   onclick="return confirm('Supprimer cet utilisateur ?')">
                     Supprimer
                </a>
                |
                <a href="index.php?action=admin_reset_password&id_agent=<?= $u['id_agent'] ?>">
                     Réinitialiser MDP
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>