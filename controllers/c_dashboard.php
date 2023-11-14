<?php

require_once(PATH_MODELS . 'DemandeDAO.php');
require_once(PATH_MODELS . 'PermanentDAO.php');
require_once(PATH_MODELS . 'NecessiteTacheDAO.php');
require_once(PATH_MODELS . 'DocumentDAO.php');
require_once(PATH_MODELS . 'AxeDAO.php');
require_once(PATH_ENTITY . 'Demande.php');

$demandeDAO = new DemandeDAO(false);
$permDAO = new PermanentDAO(false);
$necessiteTacheDAO = new NecessiteTacheDAO(false);
$documentDAO = new DocumentDAO(false);
$axeDAO = new AxeDAO(false);


$idperm = $permDAO->idfromLogin($_SESSION['logged'])[0]['idperm'];


$completes = $demandeDAO->getComplete();

$completesForPerm = $demandeDAO->getCompleteForPerm($idperm);
$incompletesForPerm = $demandeDAO->getUncompleteForPerm($idperm);

$others = $demandeDAO->getDemandesNotFor($idperm);
$demandesFor = $demandeDAO->getDemandesFor($idperm);


if ($permDAO->servicefromLogin($_SESSION['logged']) !== null) {
    $service = $permDAO->servicefromLogin($_SESSION['logged'])[0]['CODESERVICE'];
} else {
    $service = null;
}

if ($service === 3001 || $service === 3007) {
    $admin = true;
} else {
    $admin = false;
}




if (!empty($_POST)) {
    // pour les tâches
    if (isset($_POST['codeTache1']) && isset($_POST['iddem'])) {
        $code = htmlspecialchars($_POST['codeTache1']);
        $idDemande = htmlspecialchars($_POST['iddem']);
        $necessiteTacheDAO->setTermine($idDemande, $code);
        header("Location: index.php?page=dashboard");
        exit();

    } else if (isset($_POST['codeDoc1']) && isset($_POST['iddem'])) {
        $code = htmlspecialchars($_POST['codeDoc1']);
        $idDemande = htmlspecialchars($_POST['iddem']);
        $documentDAO->setTeleverse($idDemande, $code);
        header("Location: index.php?page=dashboard");
        exit();
    }


    // pour supprimer une demande
    if (isset($_POST['idDemande'])) {
        $idDemande = htmlspecialchars($_POST['idDemande']);
        $demandeDAO->deleteDemande($idDemande);
        header("Location: index.php?page=dashboard");
        exit();
    }
}



if ($admin) {
    require_once(PATH_VIEWS . 'dashboardAdmin.php');
} else if ($service !== null and $admin === false) {
    require_once(PATH_VIEWS . 'dashboardService.php');
} else {
    require_once(PATH_VIEWS . 'dashboardPerm.php');
}



?>