<?php
class DatabaseModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function queryData() {
        // Code pour exécuter des requêtes SQL et récupérer des données
        return $resultatVilles = array('Lyon', 'Marseille', 'Paris', 'Rouen', 'Perpignan', 'Rennes', 'Strasbourg' , 'Lille', 'Bordeaux', 'Toulouse');
    }

    public function insertData() {
        // Code pour insérer des données dans la base de données
    }

    // Ajoutez d'autres fonctions pour d'autres opérations sur la base de données
}
?>