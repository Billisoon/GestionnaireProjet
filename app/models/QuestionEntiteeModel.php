<?php
require_once __DIR__ . "/bd.inc.php";

class QuestionEntiteeModel
{
    public static function getAll()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM question_entitee ORDER BY ordre_affichage ASC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
}