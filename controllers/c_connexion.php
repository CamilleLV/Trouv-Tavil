<?php

require_once(PATH_MODELS . 'ConnexionDAO.php');
require_once(PATH_VIEWS . 'connexion.php');

$_SESSION = array();
//var_dump($_SESSION);

$connexionDAO = new ConnexionDAO(false);

if (isset($_POST['login']) && !empty($_POST['mdp'])) { // si les deux valeurs attendues sont entrées (login et mdp)

    $mdpSaisihash = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);
    $mdpSaisi = htmlspecialchars($_POST['mdp']);

    /* on vérifie si les valeurs existent bien en base de données avant d'essayer d'y accéder sinon erreurs */

    if ($connexionDAO->loginfrombd(htmlspecialchars($_POST['login'])) !== null) {
        $login = $connexionDAO->loginfrombd(htmlspecialchars($_POST['login']))[0]['loginperm'];
    } else {
        $login = null;
    }
    if ($connexionDAO->passwordfromlogin(htmlspecialchars($_POST['login']))) {
        $mdpBD = $connexionDAO->passwordfromlogin(htmlspecialchars($_POST['login']))[0]['mdp'];
    } else {
        $mdpBD = null;
    }


    if ($login !== null) { //si le login existe en base de données
        if ($mdpBD !== null) {
            # s'il y a un mdp en bd on compare le hash du mdp entré avec le hash en bd

            if (password_verify($mdpSaisi, $mdpBD)) {
                # succès 

                $_SESSION['logged'] = $login;

                header('Location: index.php?page=dashboard');
            } else {
                # échec
                echo ('<div class="row justify-content-center"><div class="alert alert-danger col-md-4 m-4" role="alert">
                Votre mot de passe est incorrect
            </div></div>');

            }

        } else {
            # il n'y a pas de mdp en bd : on enregistre celui qui est entré

            $connexionDAO->savepassword($login, $mdpSaisihash);

            $_SESSION['logged'] = $login;
            header('Location: index.php?page=dashboard');
        }

        //die();

    } else { // le login n'existe pas en bd

        echo ('<div class="row justify-content-center"><div class="alert alert-danger col-md-4 m-4" role="alert">
        Vérifiez votre login.
    </div></div>');
        require_once(PATH_VIEWS . 'connexion.php');
    }
} else { // une des deux valeurs est laissée vide
    if (isset($_POST['login']) || isset($_POST['mdp'])) {
        echo ('<div class="row justify-content-center"><div class="alert alert-danger col-md-4 m-4" role="alert">
        Veuillez renseigner votre login et votre mot de passe.
    </div></div>');


    }
    //require_once(PATH_VIEWS . 'connexion.php');
}


?>