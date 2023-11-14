<?php

require_once(PATH_MODELS . 'NonPermDAO.php');
require_once(PATH_MODELS . 'DemandeDAO.php');
require_once(PATH_MODELS . 'PermanentDAO.php');
require_once(PATH_MODELS . 'AxeDAO.php');
require_once(PATH_MODELS . 'CountryDAO.php');
require_once(PATH_MODELS . 'FinancementDAO.php');
require_once(PATH_MODELS . 'TacheDAO.php');
require_once(PATH_MODELS . 'NecessiteTacheDAO.php');
require_once(PATH_MODELS . 'DocumentDAO.php');
require_once(PATH_MODELS . 'StatutDAO.php');
require_once(PATH_MODELS . 'TutelleDAO.php');

include(PATH_CONTROLLERS . 'menu.php');

$nonpermDao = new NonPermDAO(false);
$demandeDAO = new DemandeDAO(false);
$permDAO = new PermanentDAO(false);
$countryDAO = new CountryDAO(false);
$axeDAO = new AxeDAO(false);
$financementDao = new FinancementDAO(false);
$tacheDAO = new TacheDAO(false);
$necessiteTacheDAO = new NecessiteTacheDAO(false);
$documentDAO = new DocumentDAO(false);
$statutDAO = new StatutDAO(false);
$tutelleDAO = new TutelleDAO(false);

$allTutelles = $tutelleDAO->getAllTutelles();
$allStatuts = $statutDAO->getAllStatuts();

$allFinancements = $financementDao->getAllFinancements();

$allPerms = $permDAO->getAllPerms();
$allNP = $nonpermDao->getAllNP();
$allCountries = $countryDAO->getAllCountries();
//var_dump($allCountries);

$nbRequiredInfo = 20;
$nbCompletedInfo = 0;

/* On vérifie que les champs sont bien remplis sinon on met les variables à null pour ne pas avoir d'erreurs de requêtes sql 
on incrémente aussi le compteur d'éléments complétés à chaque fois
*/
if (!empty($_POST['beneficiaire'])) {
    $benef = htmlspecialchars($_POST['beneficiaire']);
    $nbCompletedInfo += 6;

    $nom = $nonpermDao->npFromID($benef)['NOMNP'];
    $prenom = $nonpermDao->npFromID($benef)['PRENOMNP'];
    $email = $nonpermDao->npFromID($benef)['EMAILNP'];
    $pays = $nonpermDao->npFromID($benef)['NATIONALITE'];
    $genre = $nonpermDao->npFromID($benef)['genre'];
    $tel = $nonpermDao->npFromID($benef)['telephone'];



} else {
    $benef = null;

    if (!empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $nbCompletedInfo += 1;
    } else {
        $nom = null;
    }

    if (!empty($_POST['prenom'])) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $nbCompletedInfo += 1;
    } else {
        $prenom = null;
    }

    if (!empty($_POST['genre'])) {

        $genre = htmlspecialchars($_POST['genre']);

        $nbCompletedInfo += 1;
    } else {
        $genre = null;
    }

    if (!empty($_POST['pays'])) {
        $pays = htmlspecialchars($_POST['pays']);
        $nbCompletedInfo += 1;
    } else {
        $pays = null;
    }

    if (!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        $nbCompletedInfo += 1;
    } else {
        $email = null;
    }

    if (!empty($_POST['tel']) && ctype_digit($_POST['tel'])) {
        $tel = htmlspecialchars($_POST['tel']);
        $nbCompletedInfo += 1;
    } else {

        $tel = null;
        $nbRequiredInfo = $nbRequiredInfo - 1;
    }
}


if (!empty($_POST['typed']) && $_POST['typed'] !== 'default') {
    $typed = htmlspecialchars($_POST['typed']);
    if ($typed !== "recrutement") {
        $nbRequiredInfo = $nbRequiredInfo - 2;
    }

    $nbCompletedInfo += 1;
} else {
    $typed = null;
}

if (!empty($_POST['tutelle']) && $_POST['tutelle'] !== 'default') {
    $tutelle = htmlspecialchars($_POST['tutelle']);
    $nbCompletedInfo += 1;
} else {
    $tutelle = null;
}

if (!empty($_POST['equipe']) && $_POST['equipe'] !== 'default') {
    $equipe = htmlspecialchars($_POST['equipe']);
    $nbCompletedInfo += 1;
} else {
    $equipe = null;
}

if (!empty($_POST['darrivee'])) {
    $darrivee = htmlspecialchars($_POST['darrivee']);
    $nbCompletedInfo += 1;
} else {
    $darrivee = null;
}

if (!empty($_POST['depart'])) {
    $depart = htmlspecialchars($_POST['depart']);
    $nbCompletedInfo += 1;
} else {
    $depart = null;
}

if (!empty($_POST['status']) && $_POST['status'] !== 'default') {
    $statut = htmlspecialchars($_POST['status']);
    $nbCompletedInfo += 1;
} else {
    $statut = null;
}

if (!empty($_POST['ordi']) && $_POST['ordi'] !== 'default') {
    $ordi = htmlspecialchars($_POST['ordi']);
    if ($ordi !== "oui") {
        $nbRequiredInfo = $nbRequiredInfo - 2;
    }
    $nbCompletedInfo += 1;
    //var_dump($ordi);
} else {
    $ordi = null;
}

if (!empty($_POST['os']) && $_POST['os'] !== 'default') {
    $os = htmlspecialchars($_POST['os']);
    $nbCompletedInfo += 1;
    //var_dump($os);
} else {
    $os = null;
}

if (!empty($_POST['langue']) && $_POST['langue'] !== 'default') {
    $langue = htmlspecialchars($_POST['langue']);
    $nbCompletedInfo += 1;
    //var_dump($langue);
} else {
    $langue = null;
}

if (!empty($_POST['chimith'])) {
    $chimitheque = htmlspecialchars($_POST['chimith']);
    $nbCompletedInfo += 1;
    //var_dump($chimitheque);
} else {
    $chimitheque = null;
}


if (!empty($_POST['cdcomm'])) {

    $cdcommandes = htmlspecialchars($_POST['cdcomm']);
    $nbCompletedInfo += 1;
} else {
    $cdcommandes = null;
}

if (!empty($_POST['financement']) && $_POST['financement'] !== 'default') {
    $nomfinancement = htmlspecialchars($_POST['financement']);
    $nbCompletedInfo += 1;
} else {
    $nomfinancement = null;
}

if (!empty($_POST['SAXS']) && $_POST['SAXS'] !== 'default') {
    $SAXS = htmlspecialchars($_POST['SAXS']);
    $nbCompletedInfo += 1;
} else {
    $SAXS = null;
}

if (!empty($_POST['laser']) && $_POST['laser'] !== 'default') {
    $laser = htmlspecialchars($_POST['laser']);
    $nbCompletedInfo += 1;

} else {
    $laser = null;
}



/* Si admin alors on récupère l'id du demandeur à partir du formulaire sinon on prend l'id de la personne qui est connectée (dans la variable session) */
//var_dump($admin);

if ($admin) {
    //
    if (!empty($_POST['demandeur'])) {
        $demandeur = htmlspecialchars($_POST['demandeur']);
        $nameDemandeur = explode(' ', $_POST['demandeur'])[0];
        $idperm = $permDAO->idfromName($nameDemandeur)[0][0];

        //var_dump($idperm);
    }

} else {
    $idperm = $permDAO->idfromLogin($_SESSION['logged'])[0]['idperm'];
    //var_dump($idperm);
}

$creator = $permDAO->idfromLogin($_SESSION['logged'])[0]['idperm'];

/* On enregistre la demande si au minimum les éléments de l'identité sont remplis */

if (
    (($nom !== null && $prenom != null && $genre !== null
        && $pays !== null
        && $email != null) || $benef != null) && $typed !== null
) {

    if ($benef !== null) {
        $npid = $benef;
    } else {
        $npid = $nonpermDao->saveInfo($nom, $prenom, $email, $pays, $genre, $tel); //retourne le dernier id enregistré
        $npid = $npid[0]['LAST_INSERT_ID()'];
    }


    if ($npid !== null) {
        $idDemande = $demandeDAO->saveDemande(
            $idperm,
            $npid,
            $typed,
            $tutelle,
            $equipe,
            $darrivee,
            $depart,
            $statut,
            $nbRequiredInfo,
            $nbCompletedInfo,
            $creator,
            $ordi,
            $os,
            $langue,
            $chimitheque,
            $cdcommandes,
            $nomfinancement,
            $laser,
            $SAXS
        );

        $idDemande = $idDemande[0]['LAST_INSERT_ID()'];

        /**
         * Enregistrer les taches du pole gestion
         */

        if ($nbCompletedInfo == $nbRequiredInfo) {

            $ue = $countryDAO->isFromUE($pays);
            $idstatut = $statutDAO->getIdStatut($statut)[0];

            if ($tutelle === null) {
                $idtutelle = 20;
            } else {
                $idtutelle = $tutelleDAO->getIdTutelle($tutelle)[0];
            }

            if ($ue === true) {
                $nationalite = 'UE';
            } else {
                $nationalite = 'Hors-UE';
            }

            $allTaches = $tacheDAO->getCorrespondancesTacheByCriteres($idstatut, $idtutelle, $nationalite);
            $allDocs = $documentDAO->getCorrespondancesDocByCriteres($idstatut, $idtutelle, $nationalite);

            foreach ($allTaches as $tache) {
                $necessiteTacheDAO->saveTacheGestion($tache['codetache'], $idDemande);
            }

            foreach ($allDocs as $doc) {
                $documentDAO->saveDocs($doc['CodeDoc'], $idDemande);
            }
        }

    } else {
        $idDemande = null;
    }
    //var_dump($nbCompletedInfo, $nbRequiredInfo);
    if ($equipe !== null) {

        $nomaxe = $axeDAO->namefromId($equipe)[0]['nomaxe'];
    } else {
        $nomaxe = null;
    }

    //require_once(PATH_VIEWS . ' demandeNewConfirm.php');
    require_once(PATH_VIEWS . 'demandeNewConfirm.php');
} else {
    require_once(PATH_VIEWS . 'demandeNew.php');
}

?>