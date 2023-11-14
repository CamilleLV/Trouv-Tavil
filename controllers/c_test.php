<?php



require_once(PATH_MODELS . 'VilleDAO.php');

$villeDAO = new VilleDAO(false);

$education = $_POST['education'];
$cost = $_POST['cost'];
$transport = $_POST['transport'];
$size = $_POST['size'];
$culture = $_POST['culture'];

$result = $villeDAO->getVilles();


require_once(PATH_VIEWS . 'test.php');
