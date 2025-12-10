<?php


require_once __DIR__ . "/../models/AgentModel.php";

class AuthController {

    public function showLogin($message = "")
    {
        $error_message = $message;
        require __DIR__ . "/../views/login.php";
    }

    public function loginSubmit()
    {
        if (!isset($_POST['nom_agent'], $_POST['mot_de_passe'])) {
            return $this->showLogin("Veuillez remplir tous les champs.");
        }

        $nom_agent = trim($_POST['nom_agent']);
        $mot_de_passe = trim($_POST['mot_de_passe']);

        $agent = AgentModel::findByNom($nom_agent);

        if (!$agent) {
            return $this->showLogin("Agent introuvable.");
        }

        if (!password_verify($mot_de_passe, $agent['mot_de_passe'])) {
            return $this->showLogin("Mot de passe incorrect.");
        }

        // Connexion OK
        $_SESSION['id_agent'] = $agent['id_agent'];
        $_SESSION['nom_agent'] = $agent['nom_agent'];

        if (isset($agent['role'])) {
            $_SESSION['role'] = $agent['role'];
        }

        if (isset($agent['id_role'])) {
            $_SESSION['id_role'] = $agent['id_role'];
        }

        header("Location: index.php?action=dashboard");
        exit;
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }

    public function dashboard()
    {
        require __DIR__ . "/../views/home.php";
    }

    public function home()
    {
        require __DIR__ . "/../views/home.php";
    }
}