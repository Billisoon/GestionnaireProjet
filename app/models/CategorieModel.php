<?php
require_once __DIR__ . "/bd.inc.php";

class CategorieModel
{
    public static function getAll()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM categorie ORDER BY ordre_categorie ASC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
}