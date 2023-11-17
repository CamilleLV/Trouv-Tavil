<?php

require_once(PATH_MODELS . 'VilleDAO.php');

$villeDAO = new VilleDAO(false);

if (isset($_POST)) {

    if (!empty($_POST['education'])) {
        $education = 'true';
    } else {
        $education = 'false';
    }

    if (!empty($_POST['cost'])) {
        $cost = 'true';
    } else {
        $cost = 'false';
    }

    if (!empty($_POST['transport'])) {
        $transport = 'true';
    } else {
        $transport = 'false';
    }

    if (!empty($_POST['size'])) {
        $size = 'true';
    } else {
        $size = 'false';
    }

    if (!empty($_POST['culture'])) {
        $culture = 'true';
    } else {
        $culture = 'false';
    }


} else {
    $education = null;
    $cost = null;
    $transport = null;
    $size = null;
    $culture = null;
}

//$result = $villeDAO->getVilles('true', 'false', 'true', 'true', 'false');
if ($education !== null && $cost !== null && $transport !== null && $size !== null && $culture !== null) {
    $result = $villeDAO->getVilles($education, $cost, $transport, $size, $culture);
} else {

}


require_once(PATH_VIEWS . 'test.php');
