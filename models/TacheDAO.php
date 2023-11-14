<?php
require_once(PATH_MODELS . 'DAO.php');

class TacheDAO extends DAO
{
    /**
     * Récupère toutes les tâches d'un service donné.
     * @param int $codeService Le code du service pour lequel récupérer les tâches.
     * @return array|null Un tableau de tâches si des tâches ont été trouvées, null sinon.
     */
    public function tachesFromService(int $codeService)
    {
        $obj = new TacheDAO(false);
        $sql = "SELECT * from tache where codeservice = :codeService";
        try {
            $result = $this->queryAll($sql, array("codeService" => $codeService));
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

    public function allTachesGestion()
    {
        $obj = new TacheDAO(false);
        $sql = "SELECT * from tache where codeservice = '3001'";
        try {
            $result = $this->queryAll($sql, null);
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

    public function getAllTaches()
    {
        $obj = new TacheDAO(false);
        $sql = "SELECT * from tache";
        try {
            $result = $this->queryAll($sql, null);
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

    public function getTacheById($tache)
    {
        $obj = new TacheDAO(false);
        $sql = "SELECT * from tache, correspondances_taches, tutelle, statut where tache.codetache = correspondances_taches.codetache and tache.codetache = :tache and correspondances_taches.codetache = :tache and correspondances_taches.idtutelle = tutelle.idtutelle and correspondances_taches.idstatut = statut.idstatut order by statut.idstatut ";
        try {
            $result = $this->queryAll($sql, array("tache" => $tache));
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

    public function addTache($nomtache)
    {
        $obj = new TacheDAO(false);
        $sql = "INSERT INTO tache (nomtache, codeservice) VALUES (:nomtache, '3001')";
        try {
            $result = $this->queryAll($sql, array("nomtache" => $nomtache));
        } catch (Exception $e) {
            echo ("oups");
        }
        $lastid = "SELECT LAST_INSERT_ID()";
        try {
            $result = $this->queryAll($lastid, null);
            $tache = $result[0]['LAST_INSERT_ID()'];
        } catch (Exception $e) {
            echo ("oups");
        }
        return $tache;
    }

    public function saveTache($codetache, $statut, $tutelle, $nationalite, $facultatif)
    {

        $obj = new TacheDAO(false);

        $sql = "INSERT INTO correspondances_taches (codetache, idstatut, idtutelle, nationalite, facultatif) VALUES (:codetache, :statut, :tutelle, :nationalite, :facultatif)";
        try {
            $result = $this->queryAll($sql, array("codetache" => $codetache, "statut" => $statut, "tutelle" => $tutelle, "nationalite" => $nationalite, "facultatif" => $facultatif));

        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function modifTache($codetache, $nomtache)
    {
        $obj = new TacheDAO(false);
        $sql = "UPDATE tache SET nomtache = :nomtache WHERE codetache = :tache";
        try {
            $result = $this->queryAll($sql, array("nomtache" => $nomtache, "tache" => $codetache));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function getCorrespondancesTache($codetache)
    {
        $obj = new TacheDAO(false);
        $sql = "SELECT * from correspondances_taches where codetache = :codetache";
        try {
            $result = $this->queryAll($sql, array("codetache" => $codetache));
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

    public function getCorrespondancesTacheByCriteres($statut, $tutelle, $nationalite)
    {
        var_dump($statut, $tutelle, $nationalite);
        $obj = new TacheDAO(false);
        $sql = "SELECT * from correspondances_taches where idstatut = :statut and idtutelle = :tutelle and (nationalite = :nationalite or nationalite = 'Toutes')";
        try {
            $result = $this->queryAll($sql, array("statut" => $statut, "tutelle" => $tutelle, "nationalite" => $nationalite));
            var_dump($result);
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {

            return null;
        } else {

            return $result;
        }
    }

    public function deleteCorresp($codeTache)
    {
        $obj = new TacheDAO(false);
        $sql = "DELETE FROM correspondances_taches WHERE codetache = :codetache";
        try {
            $result = $this->queryAll($sql, array("codetache" => $codeTache));
        } catch (Exception $e) {
            echo ("oups");
        }
    }

    public function getFacultatives()
    {
        $obj = new TacheDAO(false);
        $sql = "SELECT * from taches, correspondances_taches where correspondances_taches.codetache = taches.codetache and facultatif = 1";
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

}
?>