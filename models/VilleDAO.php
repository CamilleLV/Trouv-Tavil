<?php

require_once(PATH_MODELS . 'DAO.php');


class VilleDAO extends DAO
{
    public function getVilles($crit1, $crit2, $crit3, $crit4, $crit5)
    {
        $sql = "SELECT * from Web_Resume
                where CRIT1 = True
                and (CRIT2 = True
                and CRIT3 = True
                and CRIT4 = True
                and CRIT5 = True)
                VALUES (:crit1, :crit2, :crit3, :crit4, :crit5)";

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
}
