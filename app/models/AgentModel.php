<?php
require_once __DIR__ . "/bd.inc.php";

class AgentModel
{
    public static function getAll()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM agents ORDER BY id_agent ASC";
        return $db->query($sql)->fetchAll();
    }

    public static function findById($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM agents WHERE id_agent = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function findByNom($nom)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM agents WHERE nom_agent = :nom LIMIT 1");
        $stmt->execute(["nom" => $nom]);
        return $stmt->fetch();
    }

    public static function create($nom, $prenom, $password, $role)
    {
        $db = Database::getConnection();
        $sql = "INSERT INTO agents (nom_agent, prenom_agent, mot_de_passe, role)
                VALUES (:nom, :prenom, :pass, :role)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            "nom" => $nom,
            "prenom" => $prenom,
            "pass" => $password,
            "role" => $role
        ]);
    }

    public static function update($id, $nom, $prenom, $role)
    {
        $db = Database::getConnection();
        $sql = "UPDATE agents 
                SET nom_agent = :nom, prenom_agent = :prenom, role = :role
                WHERE id_agent = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            "nom" => $nom,
            "prenom" => $prenom,
            "role" => $role,
            "id" => $id
        ]);
    }

    public static function delete($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM agents WHERE id_agent = :id");
        $stmt->execute(["id" => $id]);
    }

    public static function updatePassword($id, $password)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE agents SET mot_de_passe = :pass WHERE id_agent = :id");
        $stmt->execute([
            "pass" => $password,
            "id" => $id
        ]);
    }
}