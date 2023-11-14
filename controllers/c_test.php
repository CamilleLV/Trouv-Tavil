<?php



require_once(PATH_MODELS . 'VilleDAO.php');

$villeDAO = new VilleDAO(false);

if (isset($_POST)) {

    if (!empty($_POST['education'])) {
        $education = htmlspecialchars($_POST['education']);
    } else {
        $education = null;
    }

    if (!empty($_POST['cost'])) {
        $cost = htmlspecialchars($_POST['cost']);
    } else {
        $cost = null;
    }

    if (!empty($_POST['transport'])) {
        $transport = htmlspecialchars($_POST['transport']);
    } else {
        $transport = null;
    }

    if (!empty($_POST['size'])) {
        $size = htmlspecialchars($_POST['size']);
    } else {
        $size = null;
    }

    if (!empty($_POST['culture'])) {
        $culture = htmlspecialchars($_POST['culture']);
    } else {
        $culture = null;
    }


}

if ($education !== null && $cost !== null && $transport !== null && $size !== null && $culture !== null) {
    $result = $villeDAO->getVilles($education, $cost, $transport, $size, $culture);
} else {
    $result = $villeDAO->getVilles(true, true, true, true, true);
}


require_once(PATH_VIEWS . 'test.php');
