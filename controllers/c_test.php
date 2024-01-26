<?php

require_once(PATH_MODELS . 'VilleDAO.php');

$villeDAO = new VilleDAO(false);

if (isset($_POST)) {
    $data = json_decode(file_get_contents('assets/json/mapping-critere-nom.json'), true);
    $criteres = [];
    foreach ($data as $entry) {
        $criteres[] = $entry;
    }

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
        foreach($criteres as $critere){
            if($critere['back']==$_POST['critere1']){
                $critere1 = ($critere['bd']);
            }
        }
    } else {
        $critere1 = null;
    }

    if (!empty($_POST['critere2'])) {
        foreach($criteres as $critere){
            if($critere['back']==$_POST['critere2']){
                $critere2 = ($critere['bd']);
            }
        }
    } else {
        $critere2 = null;
    }

    if (!empty($_POST['critere3'])) {
        foreach($criteres as $critere){
            if($critere['back']==$_POST['critere3']){
                $critere3 = ($critere['bd']);
            }
        }
    } else {
        $critere3 = null;
    }

    if (!empty($_POST['critere4'])) {
        foreach($criteres as $critere){
            if($critere['back']==$_POST['critere4']){
                $critere4 = ($critere['bd']);
            }
        }
    } else {
        $critere4 = null;
    }

    if (!empty($_POST['critere5'])) {
        foreach($criteres as $critere){
            if($critere['back']==$_POST['critere5']){
                $critere5 = ($critere['bd']);
            }
        }
    } else {
        $critere5 = null;
    }
}

if ($habMin != null && $habMax != null && $department != null) {
    $result = $villeDAO->getVilles($habMin, $habMax, $department, $critere1, $critere2, $critere3, $critere4, $critere5);
} else {
}

require_once(PATH_VIEWS . 'test.php');
