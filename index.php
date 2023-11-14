<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // Déconnecter l'utilisateur
    session_unset();
    session_destroy();
    header('Location: index.php?page=connexion');
}
$_SESSION['LAST_ACTIVITY'] = time(); // Mettre à jour le dernier temps d'activité

require_once('./config/configuration.php');
require_once(PATH_TEXTES . 'lang.php');


if (isset($_GET['page'])) {

    $page = htmlspecialchars($_GET['page']); // http://.../index.php?page=toto
    if (is_file(PATH_CONTROLLERS . $_GET['page'] . ".php")) {
        if ($_GET['page'] == 'dashboard') {
            $page = 'dashboard';
        } elseif ($_GET['page'] == 'demandeNew') {
            $page = 'demandeNew';
        } elseif ($_GET['page'] == 'demandeCompleter') {
            $page = 'demandeCompleter';
        } elseif ($_GET['page'] == 'modifierDemande') {
            $page = 'modifierDemande';
        }
        require_once(PATH_CONTROLLERS . $page . '.php');
    }
} else {
    $page = 'test';
    require_once(PATH_CONTROLLERS . $page . '.php'); //appel du controller
}
