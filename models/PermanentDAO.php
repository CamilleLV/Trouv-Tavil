<?php

require_once(PATH_MODELS . 'DAO.php');


class PermanentDAO extends DAO
{

    public function idfromLogin($login)
    {
        $obj = new PermanentDAO(false);
        $sql = "SELECT idperm from permanent where loginperm = :loginperm";

        try {
            $result = $this->queryAll($sql, array("loginperm" => $login));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    public function idfromName($nom)
    {
        $obj = new PermanentDAO(false);
        $sql = "SELECT idperm from permanent where nomperm = :nomperm";

        try {
            $result = $this->queryAll($sql, array("nomperm" => $nom));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    public function namefromLogin($login)
    {
        $obj = new PermanentDAO(false);
        $sql = "SELECT nomperm, prenomperm from permanent where loginperm = :loginperm";

        try {
            $result = $this->queryAll($sql, array("loginperm" => $login));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }


    public function namefromId($id)
    {
        $obj = new PermanentDAO(false);
        $sql = "SELECT nomperm, prenomperm from permanent where idperm = :id";

        try {
            $result = $this->queryAll($sql, array("id" => $id));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }


    public function servicefromLogin($login)
    {
        $obj = new PermanentDAO(false);
        $sql = "SELECT * from permanent, service, travaillepour where permanent.idperm = travaillepour.idperm and permanent.loginperm = :loginperm and service.codeservice = travaillepour.codeservice";

        try {
            $result = $this->queryAll($sql, array("loginperm" => $login));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    public function addDepart($id)
    {
        $obj = new PermanentDAO(false);
        $sql = "UPDATE permanent SET datedepart = sysdate() where idperm = :id";

        try {
            $result = $this->queryAll($sql, array("id" => $id));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function getAllPerms()
    {
        $obj = new PermanentDAO(false);
        $sql = "SELECT nomperm, prenomperm, idperm , emailperm from permanent where datedepart is null order by nomperm";

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

    public function addNewPerm($nom, $prenom, $login, $axe, $email, $arrivee)
    {
        $obj = new PermanentDAO(false);
        $sql = "INSERT INTO permanent (nomperm, prenomperm, loginperm, emailperm, datearrivee) VALUES (:nom, :prenom, :loginperm, :emailperm, :arrivee)";
        $sql2 = "INSERT INTO appartient (idperm, idaxe) VALUES (:idperm, :codeaxe)";
        $sql3 = "SELECT idperm from permanent where loginperm = :loginperm";

        $res = $this->queryAll($sql3, array("loginperm" => $login));

        if (empty($res)) {
            try {
                $result = $this->queryAll($sql, array("nom" => $nom, "prenom" => $prenom, "loginperm" => $login, "emailperm" => $email, "arrivee" => $arrivee));
                $result2 = $this->queryAll($sql3, array("loginperm" => $login));
                $result3 = $this->queryAll($sql2, array("idperm" => $result2[0]['idperm'], "codeaxe" => $axe));
            } catch (Exception $e) {
                echo ("oups");
            }
        } else {
        }

    }

    public function archiverPerm($id, $date)
    {
        $obj = new PermanentDAO(false);
        $sql = "UPDATE permanent SET datedepart = :date where idperm = :id";

        try {
            $result = $this->queryAll($sql, array("id" => $id, "date" => $date));
        } catch (Exception $e) {
            echo ("oups");
        }
    }
}



?>