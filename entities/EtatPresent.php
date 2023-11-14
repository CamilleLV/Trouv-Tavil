<?php

require_once(PATH_ENTITY . 'Etat.php');
require_once(PATH_ENTITY . 'EtatDepartImminent.php');

class EtatPresent extends Etat
{
    private $value = 'Présent';
    public function transition()
    {
        $ddepart = $this->demande->getDateDepart()[0]['date_depart'];
        $depart = new DateTime($ddepart);
        $now = new DateTime();

        $futureTimestamp = $now->getTimestamp() + (15 * 24 * 60 * 60); // Ajoute 15 jours en secondes au timestamp actuel

        if ($depart <= new DateTime('@' . $futureTimestamp)) {
            $this->demande->setEtat(new EtatDepartImminent($this->demande));
        }

        //var_dump($this->demande->getEtat());
    }

    public function __toString()
    {
        return 'Présent';
    }

    public function getValue()
    {
        return $this->value;
    }
}



?>