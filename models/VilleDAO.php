<?php

require_once(PATH_MODELS . 'DAO.php');


class VilleDAO extends DAO
{
    public function getVilles($habMin, $habMax, $localisation, $critere1, $critere2, $critere3, $critere4, $critere5)
    {
        $sql = "SELECT COM, (21 * :critere1) + (13 * :critere2) + (8 * :critere3) + (5 * :critere4) + (3 * :critere5) as score
                from web_resume
                where Population > :habMin and Population < :habMax
                and CODDEP = :localisation
                order by score
                limit 10";

        try {
            $result = $this->queryAll(
                $sql,
                array(
                    "habMin" => $habMin,
                    "habMax" => $habMax,
                    "localisation" => $localisation,
                    "critere1" => $critere1,
                    "critere2" => $critere2,
                    "critere3" => $critere3,
                    "critere4" => $critere4,
                    "critere5" => $critere5
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
