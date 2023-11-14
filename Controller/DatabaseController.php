<?php
class DatabaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleRequest() {
        // Vérifier que il y a qu'un seul nombre de chaque dans le classement
        $dejaUtilises = array();
        if (isset($_POST['submit'])) {
            array_push($dejaUtilises, $_POST['education']);
            array_push($dejaUtilises, $_POST['cost']);
            array_push($dejaUtilises, $_POST['transport']);
            array_push($dejaUtilises, $_POST['size']);
            array_push($dejaUtilises, $_POST['culture']);
            if (count($dejaUtilises) !== count(array_flip($dejaUtilises))) {
                // il y a deux fois le même numéro de classement quelque part : pas bon
                return "Erreur : deux critères ne peuvent pas être classés avec la même valeur";
            }
        } else {
            return "";
        }
    }
}
?>