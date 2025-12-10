<?php
require_once __DIR__ . "/../models/CategorieModel.php";
require_once __DIR__ . "/../models/QuestionQualificationModel.php";
require_once __DIR__ . "/../models/QuestionEntiteeModel.php";
require_once __DIR__ . "/../core/auth.php"; 

class FormulaireController
{
    public function formMoa()
    {
        
        requireRole(["admin", "agent", "auditeur", "moa", "moe"]);

        if (!can("edit_project")) {
            die("Accès refusé : Vous ne pouvez pas modifier un projet.");
        }

        if (!isset($_GET['id_projet'])) {
            die("ID projet manquant");
        }

        $id_projet = (int) $_GET['id_projet'];

        
        $categories    = CategorieModel::getAll();
        $questions_moa = QuestionQualificationModel::getAll();

        require __DIR__ . "/../views/formulaire_moa.php";
    }

    public function formMoe()
    {
        
        requireRole(["admin", "agent", "auditeur", "moe"]);

        if (!can("edit_project")) {
            die(" Accès refusé : Vous ne pouvez pas modifier un projet.");
        }

        if (!isset($_GET['id_projet'])) {
            die("ID projet manquant");
        }

        $id_projet = (int) $_GET['id_projet'];

        
        $questions_moe = QuestionEntiteeModel::getAll();

        require __DIR__ . "/../views/formulaire_moe.php";
    }
}

