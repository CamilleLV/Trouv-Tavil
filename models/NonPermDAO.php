<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Classe NonPermDAO
 * Permet d'accéder à la table non_permanent de la base de données
 */
class NonPermDAO extends DAO
{
    /**
     * Enregistre les informations d'un membre non permanent dans la base de données
     * @param string $nom Nom du membre non permanent
     * @param string $prenom Prénom du membre non permanent
     * @param string $email Adresse email du membre non permanent
     * @param string $pays Pays d'origine du membre non permanent
     * @param string $genre Genre du membre non permanent ('M' ou 'F')
     * @param string $tel Numéro de téléphone du membre non permanent
     * @return array|null Renvoie l'identifiant du nouveau membre non permanent si l'insertion a réussi, null sinon
     */
    public function saveInfo($nom, $prenom, $email, $pays, $genre, $tel)
    {
        $obj = new NonPermDAO(false);
        // Requête SQL pour insérer les informations du non-permanent dans la table "non_permanent"
        $sql = "INSERT INTO non_permanent (NOMNP, PRENOMNP, EMAILNP, NATIONALITE, genre, telephone) VALUES (:nom, :prenom, :email, :pays, :genre, :tel)";
        // Requête SQL pour vérifier si l'information du non-permanent existe déjà dans la table "non_permanent"
        $sql2 = "SELECT * from non_permanent where NOMNP = :nom and PRENOMNP = :prenom and EMAILNP = :email and NATIONALITE = :pays and genre = :genre and telephone = :tel";
        // Exécute la requête SQL2 pour récupérer les informations du non-permanent
        $res = $this->queryAll($sql2, array("nom" => $nom, "prenom" => $prenom, "email" => $email, "pays" => $pays, "genre" => $genre, "tel" => $tel));

        if (empty($res)) {
            // Si l'information n'existe pas déjà dans la table "non_permanent", exécute la requête SQL pour l'ajouter
            try {
                $result = $this->queryAll($sql, array("nom" => $nom, "prenom" => $prenom, "email" => $email, "pays" => $pays, "genre" => $genre, "tel" => $tel));

            } catch (Exception $e) {
                // En cas d'erreur, affiche un message d'erreur
                echo ("oups");
            }

            // Exécute la requête SQL pour récupérer l'ID de la dernière insertion dans la table "non_permanent"
            $last_id = "SELECT LAST_INSERT_ID()";
            try {
                $result1 = $this->queryAll($last_id, null);

            } catch (Exception $e) {
                // En cas d'erreur, affiche un message d'erreur
                echo ("oups");
            }
        } else {
            // Si l'information existe déjà dans la table "non_permanent", affecte la valeur null à $result1
            $result1 = null;
        }

        // Retourne le résultat
        return $result1;
    }

    public function getAllPresentNP()
    {
        $obj = new NonPermDAO(false);
        $sql = "SELECT * FROM non_permanent, demande, permanent where non_permanent.idnonperm=demande.idnonperm and demande.idperm=permanent.idperm and demande.nbCompletedInfo = nbRequiredInfo  and demande.date_arrivee < sysdate() and demande.date_depart > sysdate()  order by nomnp";

        try {
            $result = $this->queryAll($sql, null);

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }



    public function getAllAbsNP()
    {
        $obj = new NonPermDAO(false);
        $sql = "SELECT * FROM non_permanent, demande, permanent where non_permanent.idnonperm=demande.idnonperm and demande.idperm=permanent.idperm and demande.nbCompletedInfo = nbRequiredInfo  and demande.date_arrivee > sysdate() order by nomnp";

        try {
            $result = $this->queryAll($sql, null);

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }


    public function getAllNP()
    {
        $obj = new NonPermDAO(false);
        $sql = "SELECT * FROM non_permanent order by nomnp";

        try {
            $result = $this->queryAll($sql, null);

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function npFromID($id)
    {
        $obj = new NonPermDAO(false);
        $sql = "SELECT * FROM non_permanent where idnonperm = :id";

        try {
            $result = $this->queryRow($sql, array("id" => $id));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

}



?>