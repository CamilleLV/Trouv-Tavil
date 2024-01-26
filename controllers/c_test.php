<?php

require_once(PATH_MODELS . 'VilleDAO.php');

$villeDAO = new VilleDAO(false);

if (isset($_POST)) {

    if (!empty($_POST["habMin"])) {
        $habMin = htmlspecialchars($_POST["habMin"]);
    } else {
        $habMin = null;
    }

    if (!empty($_POST["habMax"])) {
        $habMax = htmlspecialchars($_POST["habMax"]);
    } else {
        $habMax = null;
    }

    if (!empty($_POST["department"])) {
        $region_department = htmlspecialchars($_POST["department"]);
    } else {
        $region_department = null;
    }

    if (!empty($_POST['critere1'])) {
        $critere1 = htmlspecialchars($_POST['critere1']);
    } else {
        $critere1 = 0;
    }

    if (!empty($_POST['critere2'])) {
        $critere2 = htmlspecialchars($_POST['critere2']);
    } else {
        $critere2 = 0;
    }

    if (!empty($_POST['critere3'])) {
        $critere3 = htmlspecialchars($_POST['critere3']);
    } else {
        $critere3 = 0;
    }

    if (!empty($_POST['critere4'])) {
        $critere4 = htmlspecialchars($_POST['critere4']);
    } else {
        $critere4 = 0;
    }

    if (!empty($_POST['critere5'])) {
        $critere5 = htmlspecialchars($_POST['critere5']);
    } else {
        $critere5 = 0;
    }
}

if ($habMin != null && $habMax != null && $region_department != null) {
    $result = $villeDAO->getVilles($habMin, $habMax, $region_department, $critere1, $critere2, $critere3, $critere4, $critere5);
} else {
}

require_once(PATH_VIEWS . 'test.php');
