<?php



require_once(PATH_MODELS . 'PermanentDAO.php');

if ($_SESSION['logged']) {
    $login = $_SESSION['logged'];

} else {
    $login = null;
}

if ($login !== null) {
    $menu = "Se déconnecter";

    $permanentDAO = new PermanentDAO(false);
    $result = $permanentDAO->namefromLogin($login)[0];
    //var_dump($result);
    $nomperm = $result['nomperm'];
    $prenomperm = $result['prenomperm'];

} else {

}


require_once(PATH_VIEWS . 'header.php');


?>