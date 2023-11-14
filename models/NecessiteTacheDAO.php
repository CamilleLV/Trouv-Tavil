<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Classe DAO pour la table Necessite.
 */
class NecessiteTacheDAO extends DAO
{

    /**
     * Retourne la liste des pays de la base de données.
     * @return mixed|null Nom du pays correspondant à l'ID donné ou null si aucun pays n'est trouvé.
     */
    public function getTachesForDemande($idDemande)
    {
        $obj = new NecessiteTacheDAO(false);
        $sql = "SELECT * from necessite, tache WHERE necessite.codetache = tache.codetache AND necessite.iddemande = :idDemande";

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

    public function saveTacheGestion($code, $idDemande)
    {
        $obj = new NecessiteTacheDAO(false);
        $sql = "INSERT INTO necessite (iddemande, codetache, termine) VALUES (:idDemande, :idTache, :termine)";

        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idTache" => $code, "termine" => 0));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            // Si aucune tâche n'a été trouvée, renvoie null
            return null;
        } else {
            // Sinon, renvoie le tableau de tâches
            return $result;
        }
    }


    public function setTermine($idDemande, $idTache)
    {
        $obj = new NecessiteTacheDAO(false);
        $sql = "UPDATE necessite SET termine = 1 WHERE iddemande = :idDemande AND codetache = :idTache";

        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idTache" => $idTache));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    public function getTermine($idDemande)
    {
        $obj = new NecessiteTacheDAO(false);
        $sql = "SELECT * from necessite WHERE iddemande = :idDemande AND termine = 1";

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

    public function unsetTermine($idDemande, $idTache)
    {
        $obj = new NecessiteTacheDAO(false);
        $sql = "UPDATE necessite SET termine = 0 WHERE iddemande = :idDemande AND codetache = :idTache";

        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idTache" => $idTache));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }



    public function setUnnecessary($idDemande, $idTache)
    {
        $obj = new NecessiteTacheDAO(false);
        $sql = "UPDATE necessite SET termine = 2 WHERE iddemande = :idDemande AND codetache = :idTache";

        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande, "idTache" => $idTache));
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