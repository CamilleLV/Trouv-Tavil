<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Classe DAO pour la table Financement.
 */
class FinancementDAO extends DAO
{

    /**
     * Retourne la liste des pays de la base de données.
     * @return mixed|null Nom du pays correspondant à l'ID donné ou null si aucun pays n'est trouvé.
     */
    public function getAllFinancements()
    {
        $obj = new FinancementDAO(false);
        $sql = "SELECT * from financement where DateFin > SYSDATE() ORDER BY TitreContrat ASC";

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

    public function addNewFinancement($nomFinancement, $sigle, $etablissementPorteur, $dateDebut, $dateFin, $idResp)
    {
        $obj = new FinancementDAO(false);
        $sql = "INSERT INTO financement (TitreContrat, Sigle, EtablissementPorteur, DateDebut, DateFin, idResp) VALUES (:nomFinancement, :sigle, :etablissementPorteur, :dateDebut, :dateFin, :idResp)";
        $sql1 = "SELECT idFinancement from financement where sigle = :sigle ";

        $res = $this->queryAll($sql1, array("sigle" => $sigle));

        if (empty($res)) {

            try {
                $result = $this->queryAll($sql, array("nomFinancement" => $nomFinancement, "sigle" => $sigle, "etablissementPorteur" => $etablissementPorteur, "dateDebut" => $dateDebut, "dateFin" => $dateFin, "idResp" => $idResp));
            } catch (Exception $e) {
                echo ("oups");
            }
        }

    }

    public function getFinancementById($id)
    {
        $obj = new FinancementDAO(false);
        $sql = "SELECT * from financement where idFinancement = :id";

        try {
            $result = $this->queryRow($sql, array("id" => $id));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    public function updateFinancement($newTitre, $newSigle, $newEtabPorteur, $newDateDebut, $newDateFin, $newIdResp, $id)
    {
        $obj = new FinancementDAO(false);
        $sql = "UPDATE financement SET TitreContrat = :newTitre, Sigle = :newSigle, EtablissementPorteur = :newEtabPorteur, DateDebut = :newDateDebut, DateFin = :newDateFin, idResp = :newIdResp WHERE idFinancement = :id";

        try {
            $result = $this->queryAll($sql, array("newTitre" => $newTitre, "newSigle" => $newSigle, "newEtabPorteur" => $newEtabPorteur, "newDateDebut" => $newDateDebut, "newDateFin" => $newDateFin, "newIdResp" => $newIdResp, "id" => $id));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

}

?>