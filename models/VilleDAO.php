<?php

require_once(PATH_MODELS . 'DAO.php');


class VilleDAO extends DAO
{
    public function getVilles($habMin, $habMax, $localisation, $education, $cost, $transport, $culture)
    {
        $sql = "SELECT colonne_nom, (:education * colonne_critere_education) + (:cost * colonne_critere_cost) + (:transport * colonne_critere_transport) + (:culture * colonne_critere_culture) as score
                from web_resume
                where colonne_taille_de_la_ville > :habMin and colonne_taille_de_la_ville < :habMax
                and colonne_departement = :localisation
                order by score
                limit 10";

        try {
            $result = $this->queryAll(
                $sql,
                array(
                    "habMin" => $habMin,
                    "habMax" => $habMax,
                    "localisation" => $localisation,
                    "education" => $education,
                    "cost" => $cost,
                    "transport" => $transport,
                    "culture" => $culture
                )
            );
        } catch (Exception $e) {
            var_dump("oups");
        }
        return $result;
    }

    public function success()
    {
        $sql = "SELECT count(*) from web_resume";

        try {
            $result = $this->queryAll($sql, null);
        } catch (Exception $e) {
            var_dump("oups");
        }
        return $result;
    }
}

//  return $resultatVilles = array('Lyon', 'Marseille', 'Paris', 'Rouen', 'Perpignan', 'Rennes', 'Strasbourg' , 'Lille', 'Bordeaux', 'Toulouse');
