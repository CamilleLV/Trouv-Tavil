<?php

require_once(PATH_MODELS . 'DemandeDAO.php');
require_once(PATH_MODELS . 'PermanentDAO.php');

$demandeDAO = new DemandeDAO(false);
$permanentDAO = new PermanentDAO(false);

// Vérifier si l'utilisateur est connecté
if ($_SESSION['logged']) {
    $login = $_SESSION['logged'];
    $idperm = $permanentDAO->idfromLogin($login)[0]['idperm'];
    $incompletesForPerm = $demandeDAO->getUncompleteForPerm($idperm);
    $incompletesByCreator = $demandeDAO->getUncompleteByCreator($idperm);
    $nombre = count($incompletesForPerm) + count($incompletesByCreator);

} else {
    $login = null;
}


// Si l'utilisateur est connecté
if ($login !== null) {

    // Afficher "Se déconnecter" dans le menu
    $menu = "Se déconnecter";

    $permanentDAO = new PermanentDAO(false);
    $isFromService = false;

    // Obtenir le code de service de l'utilisateur connecté à partir de la base de données
    $req = $permanentDAO->servicefromLogin($_SESSION['logged']);
    if ($req !== null) {
        $service = $req[0]['CODESERVICE'];
        $nameService = $req[0]['NOMSERVICE'];
    } else {
        $service = null;
        $nameService = null;
    }

    // Vérifier si l'utilisateur connecté est un administrateur ou un membre de service
    if ($service === 3001 || $service === 3007) {
        $admin = true;
        $isFromService = true;
        $_SESSION['admin'] = true;
        $_SESSION['service'] = $service;

    } else if ($service === null) {
        $admin = false;
        $isFromService = false;

    } else {
        $admin = false;
        $isFromService = true;
        $_SESSION['service'] = $service;

    }
}

// Inclure le fichier menu.php pour afficher le menu
require_once(PATH_VIEWS . 'menu.php');

?>