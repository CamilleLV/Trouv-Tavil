<?php

require_once(PATH_MODELS . 'TacheDAO.php');


$tacheDao = new TacheDAO(false);
$allTaches = $tacheDao->getAllTaches();



require_once(PATH_VIEWS . 'voirTaches.php');

?>