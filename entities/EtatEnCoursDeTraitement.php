<?php

class EtatEnCoursDeTraitement extends Etat
{
    private $value = 'En cours de traitement';
    public function __construct(Demande $demande)
    {
        parent::__construct($demande);
    }

    public function transition()
    {
        //echo ("transition en cours de traitement");
        $taches = $this->demande->getTaches();
        $tachesDone = $this->demande->getTachesDone();
        $docs = $this->demande->getDocs();
        $docsDone = $this->demande->getDocsDone();

        // logique de transition vers l'état suivant
        if ($tachesDone != null && $docsDone != null) {


            if (count($taches) === count($tachesDone) && count($docs) === count($docsDone)) {
                $this->demande->setEtat(new EtatEnAttenteArrivee($this->demande));
            }
        }
        //var_dump($this->demande->getEtat());
    }

    public function __toString()
    {
        return 'En cours de traitement'; // Retournez la représentation en chaîne de caractères de l'état
    }

    public function getValue()
    {
        return $this->value;
    }
}



?>