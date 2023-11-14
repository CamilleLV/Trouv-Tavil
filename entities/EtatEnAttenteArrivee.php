<?php

require_once(PATH_ENTITY . 'Etat.php');

class EtatEnAttenteArrivee extends Etat
{
    private $value = 'En attente de l\'arrivée';
    public function transition()
    {

        //echo ("transition en attente d'arrivée");

        $darrivee = $this->demande->getDateArrivee()[0]['date_arrivee'];
        //var_dump($darrivee);
        $arrivee = new DateTime($darrivee);
        $now = new DateTime();

        if ($arrivee <= $now) {
            $this->demande->setEtat(new EtatPresent($this->demande));
            //var_dump($this->demande->getEtat());
        }


    }


    public function __toString()
    {
        return 'En attente de l\'arrivée';
    }

    public function getValue()
    {
        return $this->value;
    }
}

?>