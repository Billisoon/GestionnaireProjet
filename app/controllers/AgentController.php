<?php
require_once 'models/AgentModel.php';
require_once 'auth.php';

class AgentController {

    public static function afficherFormulaire() {
        requireAdmin();
        require 'views/admin/ajout_agent.php';
    }

    public static function ajouter() {
        requireAdmin();
        
        $nom = $_POST['nom_agent'];
        $prenom = $_POST['prenom_agent'];
        $role = $_POST['role'];
        $motDePasse = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

        AgentModel::addAgent($nom, $prenom, $motDePasse, $role);

        header("Location: index.php?action=liste_agents");
        exit();
    }
}