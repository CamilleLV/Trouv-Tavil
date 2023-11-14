<?php
require_once(PATH_MODELS . 'DAO.php');

class StatutDAO extends DAO
{

    public function getAllStatuts()
    {
        $obj = new StatutDAO(false);
        $sql = "SELECT * from statut";
        try {
            $result = $this->queryAll($sql, null);
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function getIdStatut($statut)
    {
        $obj = new StatutDAO(false);
        $sql = "SELECT idstatut from statut where intitule = :statut";
        try {
            $result = $this->queryRow($sql, array("statut" => $statut));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

}
?>