<?php
require_once __DIR__ . "/bd.inc.php";

class ReponseQuestionnaireModel
{
    public static function create($id_projet, $id_question, $valeur, $commentaire = null)
    {
        $db = Database::getConnection();
        $sql = "INSERT INTO reponse_questionnaire
                (id_question_qualification, id_projet, valeur, commentaire)
                VALUES (:idq, :idp, :val, :com)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'idq' => $id_question,
            'idp' => $id_projet,
            'val' => $valeur,
            'com' => $commentaire,
        ]);
    }
}