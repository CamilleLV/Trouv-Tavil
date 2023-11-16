<?php

require_once(PATH_MODELS . 'DAO.php');


class VilleDAO extends DAO
{
    public function getVilles($crit1, $crit2, $crit3, $crit4, $crit5)
    {
        $sql = "SELECT * from web_resume
                where CTR1_LoyerCher = :crit1
                and CTR2_Grande_ville = :crit2
                and CTR3_Gare = :crit3
                and CTR4_Ecole = :crit4
                and CTR5_Culture_Active = :crit5 limit 10";

        try {
            $result = $this->queryAll(
                $sql,
                array(
                    "crit1" => $crit1,
                    "crit2" => $crit2,
                    "crit3" => $crit3,
                    "crit4" => $crit4,
                    "crit5" => $crit5,
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
