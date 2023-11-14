<?php

require_once(PATH_MODELS . 'DemandeDAO.php');
require_once(PATH_MODELS . 'NecessiteTacheDAO.php');
require_once(PATH_MODELS . 'DocumentDAO.php');
require_once(PATH_ENTITY . 'Etat.php');
require_once(PATH_ENTITY . 'EtatEnAttenteDeTraitement.php');
require_once(PATH_ENTITY . 'EtatEnCoursDeTraitement.php');
require_once(PATH_ENTITY . 'EtatPresent.php');
require_once(PATH_ENTITY . 'EtatDepartImminent.php');
require_once(PATH_ENTITY . 'EtatEnAttenteArrivee.php');
require_once(PATH_ENTITY . 'EtatParti.php');



class Demande
{
    private $etat;
    private $demandeId;
    private $nbcompleted;
    private $nbrequired;


    public function __construct($demandeId, $nbcompleted, $nbrequired, $etat)
    {
        $this->demandeId = $demandeId;
        $this->nbcompleted = $nbcompleted;
        $this->nbrequired = $nbrequired;
        // Initialiser l'état initial de la demande
        if ($etat === 'En attente de traitement') {
            $this->etat = new EtatEnAttenteDeTraitement($this);
        } elseif ($etat === 'En cours de traitement') {
            $this->etat = new EtatEnCoursDeTraitement($this);
        } elseif ($etat === 'Présent') {
            $this->etat = new EtatPresent($this);
        } elseif ($etat === 'Départ imminent') {
            $this->etat = new EtatDepartImminent($this);
        } elseif ($etat === 'En attente de l\'arrivée') {
            $this->etat = new EtatEnAttenteArrivee($this);
        } elseif ($etat === 'Parti') {
            $this->etat = new EtatParti($this);
        }

    }

    public function changerEtat()
    {
        //echo ("changer etat");
        // Appeler la méthode de transition de l'état actuel
        $this->etat->transition();

        $dao = new DemandeDAO(false);
        $dao->enregistrerEtat($this->demandeId, $this->etat);
    }

    public function setEtat(Etat $etat)
    {
        $this->etat = $etat;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getTachesDone()
    {
        $dao = new NecessiteTacheDAO(false);
        $tachesDone = $dao->getTermine($this->demandeId);
        return $tachesDone;
    }

    public function getTaches()
    {
        $dao = new NecessiteTacheDAO(false);
        $taches = $dao->getTachesForDemande($this->demandeId);
        return $taches;
    }

    public function getDateArrivee()
    {
        $dao = new DemandeDAO(false);
        $dateArrivee = $dao->getDateArrivee($this->demandeId);
        return $dateArrivee;
    }

    public function getDateDepart()
    {
        $dao = new DemandeDAO(false);
        $dateDepart = $dao->getDateDepart($this->demandeId);
        return $dateDepart;
    }

    public function getDocsDone()
    {
        $dao = new DocumentDAO(false);
        $docsDone = $dao->docsForDemandeTeleverse($this->demandeId);
        return $docsDone;
    }

    public function getDocs()
    {
        $dao = new DocumentDAO(false);
        $docs = $dao->docsForDemande($this->demandeId);
        return $docs;
    }
}



?>