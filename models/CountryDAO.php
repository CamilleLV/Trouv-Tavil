<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Classe DAO pour la table country.
 */
class CountryDAO extends DAO
{

    /**
     * Retourne la liste des pays de la base de données.
     * @return mixed|null Nom du pays correspondant à l'ID donné ou null si aucun pays n'est trouvé.
     */
    public function getAllCountries()
    {
        $obj = new CountryDAO(false);
        $sql = "SELECT * from country ORDER BY nomcountry ASC";

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



    public function isFromUE($nomCountry)
    {
        $obj = new CountryDAO(false);
        $sql = "SELECT ue from country WHERE nomCountry = :nomCountry";

        try {
            $result = $this->queryRow($sql, array("nomCountry" => $nomCountry));
        } catch (Exception $e) {
            echo ("oups");
        }
        if (empty($result)) {
            return null;
        } else {
            if ($result[0] == 'oui') {
                return true;
            } else {
                return false;
            }
        }
    }


}

?>