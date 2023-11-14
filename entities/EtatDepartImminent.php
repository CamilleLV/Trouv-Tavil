<?php

require_once(PATH_ENTITY . 'Etat.php');


class EtatDepartImminent extends Etat
{
    private $value = 'Départ imminent';
    public function transition()
    {
        $depart = $this->demande->getDateDepart()[0]['date_depart'];
        //var_dump($darrivee);
        $datedepart = new DateTime($depart);
        $now = new DateTime();

        if ($datedepart < $now) {

            $this->demande->setEtat(new EtatParti($this->demande));
            //var_dump($this->demande->getEtat());
        }
    }


    public function __toString()
    {
        return 'Départ imminent';
    }

    public function getValue()
    {
        return $this->value;
    }
}


?>