<?php
require_once __DIR__ . "/../models/ReponseQuestionnaireModel.php";
require_once __DIR__ . "/../models/ReponseEntiteeModel.php";


class ProjetController
{
    public static function saveMoa()
    {
        if (!isset($_GET['id_projet'])) {
            die("ID projet manquant");
        }

        $id_projet = (int) $_GET['id_projet'];

        if (!isset($_POST['valeur'])) {
            // Rien à enregistrer
            header("Location: index.php?action=formulaire_moa&id_projet=" . $id_projet);
            exit;
        }

        foreach ($_POST['valeur'] as $id_q => $value) {
            $commentaire = $_POST['commentaire'][$id_q] ?? null;

            ReponseQuestionnaireModel::create(
                $id_projet,
                (int) $id_q,
                $value,
                $commentaire
            );
        }

        header("Location: index.php?action=formulaire_moa&id_projet=" . $id_projet);
        exit;
    }

    public static function saveMoe()
    {
        if (!isset($_GET['id_projet'])) {
            die("ID projet manquant");
        }

        $id_projet = (int) $_GET['id_projet'];

        if (!isset($_POST['retenue'])) {
            header("Location: index.php?action=formulaire_moe&id_projet=" . $id_projet);
            exit;
        }

        foreach ($_POST['retenue'] as $id_q => $ret) {
            $commentaire    = $_POST['commentaire_moe'][$id_q] ?? null;
            $acceptabilite  = $_POST['acceptabilite'][$id_q]   ?? null;
            $strategie      = $_POST['strategie'][$id_q]       ?? null;
            $avancement     = $_POST['avancement'][$id_q]      ?? null;

            ReponseEntiteeModel::create(
                $id_projet,
                (int) $id_q,
                $ret,
                $commentaire,
                $acceptabilite,
                $strategie,
                $avancement
            );
        }

        header("Location: index.php?action=formulaire_moe&id_projet=" . $id_projet);
        exit;
    }
}