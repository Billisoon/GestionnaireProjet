<?php

function requireLogin() {
    session_start();
    if (!isset($_SESSION['id_agent'])) {
        header("Location: index.php?action=login");
        exit;
    }
}

function requireAdmin() {
    requireLogin();
    if ($_SESSION['role'] !== 'admin') {
        die("Accès interdit.");
    }
}

function requireRole($roles) {
    if (!isset($_SESSION['role'])) {
        die("Accès refusé : utilisateur non connecté.");
    }

    if (!in_array($_SESSION['role'], (array)$roles)) {
        die("Accès refusé : rôle insuffisant.");
    }
}

function hasRole($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

function can($permission) {
    static $rights = [

       
        "admin" => [
            "edit_tables" => true,
            "edit_project" => true,
            "edit_all_projects" => true,
            "read_all" => true
        ],

       
        "agent" => [
            "edit_project" => true,
            "edit_all_projects" => false,
            "edit_tables" => false,
            "read_all" => false
        ],

       
        "auditeur" => [
            "edit_all_projects" => true,
            "edit_project" => true,
            "edit_tables" => false,
            "read_all" => true
        ],

       
        "moe" => [
            "edit_project" => true,
            "edit_all_projects" => false,
            "edit_tables" => false,
            "read_all" => false
        ],

      
        "moa" => [
            "edit_project" => true,
            "edit_all_projects" => false,
            "edit_tables" => false,
            "read_all" => false
        ],

       
        "lecteur" => [
            "read_all" => true,
            "edit_project" => false,
            "edit_all_projects" => false,
            "edit_tables" => false
        ]
        ];
    $role = $_SESSION['role'] ?? null;

    return $role && ($rights[$role][$permission] ?? false);
}

?>