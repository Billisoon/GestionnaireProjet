<?php
require_once __DIR__ . "/../models/AgentModel.php";
require_once __DIR__ . "/../core/auth.php";

class AdminController
{
    public function usersList()
    {
        requireRole(["admin"]);

        $users = AgentModel::getAll();
        require __DIR__ . "/../views/admin/users_list.php";
    }

    public function addUserForm()
    {
        requireRole(["admin"]);
        require __DIR__ . "/../views/admin/add_user.php";
    }

    public function addUserSubmit()
    {
        requireRole(["admin"]);

        $nom = $_POST['nom_agent'];
        $prenom = $_POST['prenom_agent'] ?? null;
        $role = $_POST['role'];
        $password = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

        AgentModel::create($nom, $prenom, $password, $role);
        
        header("Location: index.php?action=admin_users");
        exit;
    }

    public function editUserForm()
    {
        requireRole(["admin"]);
        $id = (int) $_GET["id_agent"];

        $user = AgentModel::findById($id);

        require __DIR__ . "/../views/admin/edit_user.php";
    }

    public function editUserSubmit()
    {
        requireRole(["admin"]);

        $id = (int) $_POST["id_agent"];
        $nom = $_POST['nom_agent'];
        $prenom = $_POST['prenom_agent'];
        $role = $_POST['role'];

        AgentModel::update($id, $nom, $prenom, $role);

        header("Location: index.php?action=admin_users");
        exit;
    }

    public function deleteUser()
    {
        requireRole(["admin"]);

        $id = (int) $_GET["id_agent"];
        AgentModel::delete($id);

        header("Location: index.php?action=admin_users");
        exit;
    }

    public function resetPassword()
    {
        requireRole(["admin"]);

        $id = (int) $_GET["id_agent"];
        $newPass = password_hash("reset1234", PASSWORD_BCRYPT);

        AgentModel::updatePassword($id, $newPass);

        echo "Mot de passe réinitialisé à : reset1234";
    }
}