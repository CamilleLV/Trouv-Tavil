<?php
require_once(PATH_MODELS . 'DAO.php');

class TutelleDAO extends DAO
{

    public function getAllTutelles()
    {
        $obj = new TutelleDAO(false);
        $sql = "SELECT * from tutelle";
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

    public function getIdTutelle($tutelle)
    {
        $obj = new TutelleDAO(false);
        $sql = "SELECT idtutelle from tutelle where nomtutelle = :tutelle";
        try {
            $result = $this->queryRow($sql, array("tutelle" => $tutelle));
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