<?php
require_once(PATH_MODELS . 'DAO.php');

class DocumentDAO extends DAO
{

    public function docsForDemande(int $idDemande)
    {
        $obj = new DocumentDAO(false);
        $sql = "SELECT * from complete, documents where complete.idDemande = :idDemande and complete.codedoc = documents.codedoc";
        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function docsForDemandeTeleverse(int $idDemande)
    {
        $obj = new DocumentDAO(false);
        $sql = "SELECT * from complete, documents where complete.idDemande = :idDemande and complete.codedoc = documents.codedoc and complete.televerse = 1";
        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function saveDocs($code, $idDemande)
    {
        $obj = new DocumentDAO(false);
        $sql = "INSERT INTO complete (idDemande, codedoc, televerse) VALUES (:idDemande, :idDoc, :televerse)";

        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idDoc" => $code, "televerse" => 0));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }



    public function allDocs()
    {
        $obj = new DocumentDAO(false);
        $sql = "SELECT * from documents";
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

    public function setTeleverse($idDemande, $idDoc)
    {
        $obj = new DocumentDAO(false);
        $sql = "UPDATE complete SET televerse = 1 WHERE idDemande = :idDemande AND codedoc = :idDoc";
        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idDoc" => $idDoc));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function unsetTeleverse($idDemande, $idDoc)
    {
        $obj = new DocumentDAO(false);
        $sql = "UPDATE complete SET televerse = 0 WHERE idDemande = :idDemande AND codedoc = :idDoc";
        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idDoc" => $idDoc));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function setUnnecessary($idDemande, $idDoc)
    {
        $obj = new DocumentDAO(false);
        $sql = "UPDATE complete SET televerse = 2 WHERE idDemande = :idDemande AND codedoc = :idDoc";
        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idDoc" => $idDoc));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function getDocById($doc)
    {
        $obj = new DocumentDAO(false);
        $sql = "SELECT * from documents, correspondances_doc, tutelle, statut where correspondances_doc.codedoc = documents.codedoc and  correspondances_doc.idstatut = statut.idstatut and  correspondances_doc.idtutelle = tutelle.idtutelle and documents.codedoc = :doc";
        try {
            $result = $this->queryAll($sql, array("doc" => $doc));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function addDoc($nomdoc)
    {
        $obj = new DocumentDAO(false);
        $sql = "INSERT INTO documents (nomdoc) VALUES (:nomdoc)";
        try {
            $result = $this->queryAll($sql, array("nomdoc" => $nomdoc));
        } catch (Exception $e) {
            echo ("oups");
        }
        $lastid = "SELECT LAST_INSERT_ID()";
        try {
            $result = $this->queryAll($lastid, null);
            $doc = $result[0]['LAST_INSERT_ID()'];
            return $doc;
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function saveDoc($code, $idstatut, $idtutelle, $nationalite, $facultatif)
    {
        $obj = new DocumentDAO(false);
        $sql = "INSERT INTO correspondances_doc (codedoc, idstatut, idtutelle, nationalite, facultatif) VALUES (:code, :idstatut, :idtutelle, :nationalite, :facultatif)";
        try {
            $result = $this->queryAll($sql, array("code" => $code, "idstatut" => $idstatut, "idtutelle" => $idtutelle, "nationalite" => $nationalite, "facultatif" => $facultatif));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function getCorrespondancesDoc($code)
    {
        $obj = new DocumentDAO(false);
        $sql = "SELECT * from correspondances_doc where codedoc = :code";
        try {
            $result = $this->queryAll($sql, array("code" => $code));
        } catch (Exception $e) {
            echo ("oups");
        }
        return $result;
    }

    public function getCorrespondancesDocByCriteres($statut, $tutelle, $nationalite)
    {
        $obj = new DocumentDAO(false);
        $sql = "SELECT * from correspondances_doc where idstatut = :statut and idtutelle = :tutelle and (nationalite = :nationalite or nationalite = 'Toutes')";
        try {
            $result = $this->queryAll($sql, array("statut" => $statut, "tutelle" => $tutelle, "nationalite" => $nationalite));
        } catch (Exception $e) {
            echo ("oups");
        }
        return $result;
    }

    public function deleteCorrespDoc($code)
    {
        $obj = new DocumentDAO(false);
        $sql = "DELETE from correspondances_doc where codedoc = :code";
        try {
            $result = $this->queryAll($sql, array("code" => $code));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function modifDoc($code, $nomdoc)
    {
        $obj = new DocumentDAO(false);
        $sql = "UPDATE documents SET nomdoc = :nomdoc WHERE codedoc = :code";
        try {
            $result = $this->queryAll($sql, array("code" => $code, "nomdoc" => $nomdoc));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function saveModifDoc($code, $idstatut, $idtutelle, $nationalite, $facultatif)
    {
        $obj = new DocumentDAO(false);
        $sql = "INSERT INTO correspondances_doc (codedoc, idstatut, idtutelle, nationalite, facultatif) VALUES (:code, :idstatut, :idtutelle, :nationalite, :facultatif)";
        try {
            $result = $this->queryAll($sql, array("code" => $code, "idstatut" => $idstatut, "idtutelle" => $idtutelle, "nationalite" => $nationalite, "facultatif" => $facultatif));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function getFacultatifs()
    {
        $obj = new DocumentDAO(false);
        $sql = "SELECT distinct(correspondances_doc.codedoc) from documents, correspondances_doc where correspondances_doc.codedoc = documents.codedoc and facultatif = 1";
        try {
            $result = $this->queryAll($sql, null);
        } catch (Exception $e) {
            echo ("oups");
        }
        return $result;
    }
}
?>