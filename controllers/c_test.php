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

    if (!empty($_POST["region_department"])) {
        $region_department = htmlspecialchars($_POST["region_department"]);
    } else {
        $region_department = null;
    }

    if (!empty($_POST['education'])) {
        $education = htmlspecialchars($_POST['education']);
    } else {
        $education = 0;
    }

    if (!empty($_POST['cost'])) {
        $cost = htmlspecialchars($_POST['cost']);
    } else {
        $cost = 0;
    }

    if (!empty($_POST['transport'])) {
        $transport = htmlspecialchars($_POST['transport']);
    } else {
        $transport = 0;
    }

    if (!empty($_POST['culture'])) {
        $culture = htmlspecialchars($_POST['culture']);
    } else {
        $culture = 0;
    }
}

if ($habMin != null && $habMax != null && $region_department != null) {
    $result = $villeDAO->getVilles($habMin, $habMax, $region_department, $education, $cost, $transport, $culture);
} else {
}

require_once(PATH_VIEWS . 'test.php');
