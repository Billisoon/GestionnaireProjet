<?php
session_start();

require_once "app/controllers/AuthController.php";
require_once "app/controllers/ProjetController.php";
require_once "app/controllers/FormulaireController.php";
require_once "app/controllers/AdminController.php";

$admin = new AdminController();
$auth = new AuthController();
$projet = new ProjetController();
$formulaire = new FormulaireController();

$action = $_GET['action'] ?? 'home';

switch ($action) {

    case 'login':
        $auth->showLogin();
        break;
    case 'loginSubmit':
        $auth->loginSubmit();
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'home':
    case 'dashboard':
        $auth->home();
        break;

    case 'formulaire_moa':
        $formulaire->formMoa();
        break;

    case 'save_moa':
        ProjetController::saveMoa();
        break;

    case 'formulaire_moe':
        $formulaire->formMoe();
        break;

    case 'save_moe':
        ProjetController::saveMoe();
        break;

    
    case 'admin_users':
        $admin->usersList();
        break;

    case 'admin_add_user':
        $admin->addUserForm();
        break;

    case 'admin_add_user_submit':
        $admin->addUserSubmit();
        break;

    case 'admin_edit_user':
        $admin->editUserForm();
        break;

    case 'admin_edit_user_submit':
        $admin->editUserSubmit();
        break;

    case 'admin_delete_user':
        $admin->deleteUser();
        break;

    case 'admin_reset_password':
        $admin->resetPassword();
        break;
    
    default:
        http_response_code(404);
        echo "404 - Page non trouvée";
        break;
}