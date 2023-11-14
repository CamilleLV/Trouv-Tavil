<?php
require_once(PATH_MODELS . 'DAO.php');

class ServiceDAO extends DAO
{

    public function getAllServices()
    {
        $obj = new ServiceDAO(false);
        $sql = "SELECT * from service ";
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

    public function addService($nomservice, $idpermresp)
    {
        $obj = new ServiceDAO(false);
        $sql = "INSERT INTO service (nomservice, idpermresp) VALUES (:nomservice, :idpermresp)";
        $param = array(
            'nomservice' => $nomservice,
            'idpermresp' => $idpermresp
        );
        try {
            $result = $this->queryAll($sql, $param);
        } catch (Exception $e) {
            echo ("oups");
        }
    }

}
?>