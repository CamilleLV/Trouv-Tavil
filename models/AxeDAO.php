<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Classe DAO pour la table axe.
 */
class AxeDAO extends DAO
{

    /**
     * Retourne le nom de l'axe correspondant à l'ID donné.
     * @param int $id Identifiant de l'axe.
     * @return mixed|null Nom de l'axe correspondant à l'ID donné ou null si aucun axe n'est trouvé.
     */
    public function namefromId($id)
    {
        $obj = new AxeDAO(false);
        $sql = "SELECT nomaxe from axe where idaxe = :idaxe";

        try {
            $result = $this->queryAll($sql, array("idaxe" => $id));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    public function getGestionnaire($id)
    {
        $obj = new AxeDAO(false);
        $sql = "SELECT * from axe, permanent where idaxe = :idaxe and axe.idpermgestionnaire = permanent.idperm";

        try {
            $result = $this->queryAll($sql, array("idaxe" => $id));
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