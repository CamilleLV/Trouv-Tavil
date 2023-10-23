<?php
class DatabaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleRequest() {
        // Gérer les demandes de l'utilisateur, appeler les fonctions du modèle, et afficher la vue appropriée
    }
}
?>