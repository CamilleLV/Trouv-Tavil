<?php

require_once(PATH_ENTITY . 'Etat.php');

class EtatParti extends Etat
{
    private $value = 'Parti';
    public function transition()
    {

    }


    public function __toString()
    {
        return 'Parti';
    }

    public function getValue()
    {
        return $this->value;
    }
}

?>