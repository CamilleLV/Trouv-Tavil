<?php

require_once(PATH_MODELS . 'DAO.php');

class ConnexionDAO extends DAO
{
    /**
     * Récupère le login d'un utilisateur dans la base de données à partir du login fourni
     * 
     * @param string $login Le login de l'utilisateur
     * @return array|null Les informations de l'utilisateur si trouvé, sinon null
     */
    public function loginfrombd($login)
    {
        $sql = "SELECT loginperm FROM permanent WHERE loginperm = :loginperm";

        try {
            $result = $this->queryAll($sql, array("loginperm" => $login));
        } catch (Exception $e) {
            echo ("oups");
        }

        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    /** 
     * 
     * Récupère le mot de passe d'un utilisateur dans la base de données à partir du login fourni
     * 
     * @param string $login Le login de l'utilisateur
     * @return array|null Le mot de passe de l'utilisateur si trouvé, sinon null
     */
    public function passwordfromlogin($login)
    {
        $sql = "SELECT mdp FROM permanent WHERE loginperm = :loginperm";

        try {
            $result = $this->queryAll($sql, array("loginperm" => $login));
        } catch (Exception $e) {
            echo ("oups");
        }

        if (empty($result)) {
            return null;
        } else {
            return $result;
        }
    }

    /**
     * Enregistre le nouveau mot de passe d'un utilisateur dans la base de données
     * 
     * @param string $login Le login de l'utilisateur
     * @param string $mdpSaisi Le nouveau mot de passe de l'utilisateur
     * @return array|null Le résultat de la requête si elle a réussi, sinon null
     */
    public function savepassword($login, $mdpSaisi)
    {
        $sql = "UPDATE permanent SET mdp=:mdp WHERE loginperm=:loginp ";

        try {
            $result = $this->queryAll($sql, array("mdp" => $mdpSaisi, "loginp" => $login));
        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

}