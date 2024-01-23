<?php

require_once(PATH_MODELS . 'DAO.php');


class VilleDAO extends DAO
{
    public function getVilles($habMin, $habMax, $localisation, $education, $cost, $transport, $culture, $sante)
    {
        $sql = "SELECT nom_commune, (:education * Note_Ecole) + (:cost * Note_Loyer) + (:transport * Note_Gare) + (:culture * Note_Culture) + (:sante * Note_Medecin) as score
                from web_resume
                where taille_population > :habMin and taille_population < :habMax
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
                    "culture" => $culture,
                    "sante" => $sante
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
