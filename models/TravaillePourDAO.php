<?php

require_once(PATH_MODELS . 'DAO.php');


class TravaillePourDAO extends DAO
{

    public function permInService()
    {
        $obj = new TravaillePourDAO(false);
        $sql = "SELECT idperm from travaillepour";

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

    public function addpermToService($idperm, $idservice)
    {
        $obj = new TravaillePourDAO(false);
        $sql = "INSERT INTO travaillepour (idperm, codeservice) VALUES (:idperm, :idservice)";
        $param = array(
            'idperm' => $idperm,
            'idservice' => $idservice
        );
        try {
            $result = $this->queryAll($sql, $param);
        } catch (Exception $e) {
            echo ("oups");
        }

    }

    public function getMembers($idservice)
    {
        $obj = new TravaillePourDAO(false);
        $sql = "SELECT travaillepour.idperm, nomperm, prenomperm from travaillepour, permanent where travaillepour.idperm = permanent.idperm and codeservice = :idservice";
        $param = array(
            'idservice' => $idservice
        );
        try {
            $result = $this->queryAll($sql, $param);
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    public function removePerm($idperm)
    {
        $obj = new TravaillePourDAO(false);
        $sql = "DELETE FROM travaillepour WHERE idperm = :idperm";
        $param = array(
            'idperm' => $idperm
        );
        try {
            $result = $this->queryAll($sql, $param);
        } catch (Exception $e) {
            echo ("oups");
        }


    }

}



?>