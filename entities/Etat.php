<?php

require_once(PATH_ENTITY . 'Demande.php');
abstract class Etat
{
    protected $demande;

    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }

    abstract public function transition();
}

?>