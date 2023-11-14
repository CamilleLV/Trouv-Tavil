<?php

require_once(PATH_ENTITY . 'Etat.php');

class EtatEnAttenteDeTraitement extends Etat
{

    private $value = 'En attente de traitement';
    public function __construct(Demande $demande)
    {
        parent::__construct($demande);
    }

    public function transition()
    {
        //echo ("transition en attente de traitement");
        $tachesDone = $this->demande->getTachesDone();
        //logique de transition vers l'état suivant
        //var_dump($tachesDone);
        if (!empty($tachesDone)) {
            $this->demande->setEtat(new EtatEnCoursDeTraitement($this->demande));

        }
        //var_dump($this->demande->getEtat());
    }


    public function __toString()
    {
        return 'En attente de traitement'; // Retournez la représentation en chaîne de caractères de l'état
    }

    public function getValue()
    {
        return $this->value;
    }
}


?>