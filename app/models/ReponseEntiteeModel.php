<?php
require_once __DIR__ . "/bd.inc.php";

class ReponseEntiteeModel
{
    public static function create($id_projet, $id_question, $valeur, $commentaire, $acceptabilite, $strategie, $avancement)
    {
        $db = Database::getConnection();
        $sql = "INSERT INTO reponse_entitee
                (id_question_entitee, id_projet, valeur, commentaire, acceptabilite, strategie_amelioration, avancement)
                VALUES (:idq, :idp, :val, :com, :acc, :strat, :av)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'idq'   => $id_question,
            'idp'   => $id_projet,
            'val'   => $valeur,
            'com'   => $commentaire,
            'acc'   => $acceptabilite,
            'strat' => $strategie,
            'av'    => $avancement,
        ]);
    }
}