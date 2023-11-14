<?php

require_once(PATH_MODELS . 'DAO.php');


class DemandeDAO extends DAO
{

    /**
     * Enregistre une nouvelle demande dans la base de données
     * @param int $idperm L'identifiant du permanent associé à la demande
     * @param int $idnonperm L'identifiant du non permanent associé à la demande
     * @param string $typed Le type de démarche demandée
     * @param string $tutelle La tutelle de la démarche demandée
     * @param string $equipe Le nom de l'équipe en charge de la demande
     * @param string $darrivee La date d'arrivée prévue pour la demande
     * @param string $depart La date de départ prévue pour la demande
     * @param string $statut Le statut actuel de la demande
     * @param int $nbRequiredInfo Le nombre d'informations requises pour la demande
     * @param int $nbCompletedInfo Le nombre d'informations complétées pour la demande
     * @param string $creator L'identifiant de l'utilisateur créant la demande
     * @param string $ordi oui si un ordi est demandé non sinon
     * @param string $os Le système d'exploitation demandé
     * @param string $langue La langue demandée pour l'ordi 
     * @param string $chimitheque oui si l'accès à la chimitheque est demandé non sinon
     * @param string $cdcommandes oui si l'accès au cahier de commandes est demandé non sinon
     * @return array L'identifiant de la demande créée
     */
    public function saveDemande($idperm, $idnonperm, $typed, $tutelle, $equipe, $darrivee, $depart, $statut, $nbRequiredInfo, $nbCompletedInfo, $creator, $ordi, $os, $langue, $chimitheque, $cdcommandes, $nomfinancement, $laser, $SAXS)
    {
        $sql = "INSERT INTO demande (IDPERM, IDNONPERM, TYPEDEMARCHE, TUTELLE, EQUIPE, DATE_ARRIVEE, DATE_DEPART, STATUT, NBREQUIREDINFO, NBCOMPLETEDINFO, CREATEUR, ORDI, OS, LANGUE, CHIMITHEQUE, CDCOMMANDES, NOMFINANCEMENT, SAXS, LASERS) 
                VALUES (:idperm, :idnonperm, :typed, :tutelle, :equipe, :darrivee, :depart, :statut, :nbrequired, :completed, :creator, :ordi, :os, :langue, :chimitheque, :cdcommandes, :nomfinancement, :SAXS, :laser)";

        try {
            $this->queryAll(
                $sql,
                array(
                    "idperm" => $idperm,
                    "idnonperm" => $idnonperm,
                    "typed" => $typed,
                    "tutelle" => $tutelle,
                    "equipe" => $equipe,
                    "darrivee" => $darrivee,
                    "depart" => $depart,
                    "statut" => $statut,
                    "nbrequired" => $nbRequiredInfo,
                    "completed" => $nbCompletedInfo,
                    "creator" => $creator,
                    "ordi" => $ordi,
                    "os" => $os,
                    "langue" => $langue,
                    "chimitheque" => $chimitheque,
                    "cdcommandes" => $cdcommandes,
                    "nomfinancement" => $nomfinancement,
                    "SAXS" => $SAXS,
                    "laser" => $laser

                )
            );


        } catch (Exception $e) {
            var_dump("oups");
        }


        $last_id = "SELECT LAST_INSERT_ID()";
        try {
            $result = $this->queryAll($last_id, null);

        } catch (Exception $e) {
            // En cas d'erreur, affiche un message d'erreur
            echo ("oups");
        }
        return $result;
    }

    /**
     * Récupère toutes les demandes non terminées
     * @return array Le tableau de toutes les demandes non terminées
     */
    public function getUncomplete()
    {
        $sql = "SELECT * from non_permanent, permanent, demande 
                where nbRequiredInfo != nbCompletedInfo 
                and demande.idperm = permanent.idperm 
                and demande.idnonperm = non_permanent.idnonperm 
                order by createur";

        try {
            $result = $this->queryAll($sql, null);
        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }


    /**
     * Récupère toutes les demandes
     *
     * @return array Le tableau de toutes les demandes
     */
    public function allDemandes()
    {
        $sql = "SELECT * from non_permanent, permanent, demande 
                where demande.idperm = permanent.idperm 
                and demande.idnonperm = non_permanent.idnonperm
                order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, null);
        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }


    /**
     * Cette fonction récupère toutes les demandes non complètes liées à un permanent.
     *
     * @param int $perm L'identifiant du permanent
     * @return array Le résultat de la requête
     */
    public function getUncompleteForPerm($perm)
    {

        $sql = "SELECT * from non_permanent, permanent, demande 
                        where permanent.idperm = :perm 
                        and  nbRequiredInfo != nbCompletedInfo 
                        and demande.idperm = permanent.idperm 
                        and demande.idnonperm = non_permanent.idnonperm 
                        order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, array("perm" => $perm));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    /**
     * Cette fonction récupère une demande non complète selon son identifiant.
     *
     * @param int $idDemande L'identifiant de la demande
     * @return array Le résultat de la requête
     */
    public function getUncompleteById($idDemande)
    {

        $sql = "SELECT * from non_permanent, permanent, demande 
                        where demande.iddemande = :id 
                        and  nbRequiredInfo != nbCompletedInfo 
                        and demande.idperm = permanent.idperm 
                        and demande.idnonperm = non_permanent.idnonperm ";

        try {
            $result = $this->queryAll($sql, array("id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    /**
     * Cette fonction récupère une demande complète selon son identifiant.
     *
     * @param int $idDemande L'identifiant de la demande
     * @return array Le résultat de la requête
     */
    public function getCompleteById($idDemande)
    {

        $sql = "SELECT * from non_permanent, permanent, demande 
                        where demande.iddemande = :id 
                        and  nbRequiredInfo = nbCompletedInfo 
                        and demande.idperm = permanent.idperm 
                        and demande.idnonperm = non_permanent.idnonperm ";

        try {
            $result = $this->queryAll($sql, array("id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    /**
     * Cette fonction récupère toutes les demandes complètes.
     *
     * @return array Le résultat de la requête
     */
    public function getComplete()
    {
        $sql = "SELECT * from non_permanent, permanent, demande 
                        where nbRequiredInfo = nbCompletedInfo 
                        and demande.idperm = permanent.idperm 
                        and demande.idnonperm = non_permanent.idnonperm 
                        order by demande.iddemande, createur";

        try {
            $result = $this->queryAll($sql, null);

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    /**
     * Récupère les demandes complètes pour un membre permanent spécifié.
     *
     * @param int $perm L'identifiant du membre permanent.
     * @return array Les demandes complètes correspondantes.
     */
    public function getCompleteForPerm($perm)
    {

        $sql = "SELECT * FROM non_permanent, permanent, demande 
                        WHERE permanent.idperm = :perm 
                        AND nbRequiredInfo = nbCompletedInfo 
                        AND demande.idperm = permanent.idperm 
                        AND demande.idnonperm = non_permanent.idnonperm
                        order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, array("perm" => $perm));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function getCompleteByCreator($creator)
    {

        $sql = "SELECT * FROM non_permanent, permanent, demande 
                        WHERE demande.createur = :creator 
                        AND demande.createur != demande.idperm
                        AND nbRequiredInfo = nbCompletedInfo 
                        AND demande.idperm = permanent.idperm 
                        AND demande.idnonperm = non_permanent.idnonperm
                        order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, array("creator" => $creator));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function getUncompleteByCreator($creator)
    {

        $sql = "SELECT * FROM non_permanent, permanent, demande 
                        WHERE demande.createur = :creator 
                        AND demande.createur != demande.idperm
                        AND nbRequiredInfo != nbCompletedInfo 
                        AND demande.createur = permanent.idperm 
                        AND demande.idnonperm = non_permanent.idnonperm
                        order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, array("creator" => $creator));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    /**
     * Met à jour les informations d'une demande spécifiée.
     *
     * @param int $idDemande L'identifiant de la demande à mettre à jour.
     * @param string $typed Le type de démarche de la demande.
     * @param string $tut La tutelle de la demande.
     * @param string $statut Le statut de la demande.
     * @param string $depart La date de départ de la demande.
     * @param string $arrivee La date d'arrivée de la demande.
     * @param string $equipe L'équipe en charge de la demande.
     * @param int $nbcompleted Le nombre d'informations complétées de la demande.
     * @return array Le résultat de la mise à jour.
     */
    public function updateInfo(
        $idDemande,
        $typed,
        $tutComp,
        $financementComp,
        $statutComp,
        $equipeComp,
        $darriveeComp,
        $departComp,
        $ordiComp,
        $osComp,
        $langueComp,
        $chimithComp,
        $cdcommComp,
        $nbrequired,
        $nbcompleted,
        $laser,
        $SAXS
    ) {
        $sql = "UPDATE demande set typedemarche = :typed, tutelle = :tut, statut = :statut, equipe = :equipe, date_arrivee = :darrivee, date_depart = :depart, ordi = :ordi, os = :os, langue = :langue, chimitheque = :chimith, cdcommandes = :cdcomm, nomfinancement = :financement, nbrequiredinfo = :nbrequired, nbcompletedinfo = :nb, SAXS = :SAXS, lasers = :laser where iddemande = :id";

        try {
            $result = $this->queryAll($sql, array("typed" => $typed, "tut" => $tutComp, "statut" => $statutComp, "equipe" => $equipeComp, "darrivee" => $darriveeComp, "depart" => $departComp, "ordi" => $ordiComp, "os" => $osComp, "langue" => $langueComp, "chimith" => $chimithComp, "cdcomm" => $cdcommComp, "financement" => $financementComp, "nb" => $nbcompleted, "nbrequired" => $nbrequired, "SAXS" => $SAXS, "laser" => $laser, "id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    /**
     * Récupère l'identifiant d'un non-permanent à partir de l'identifiant de la demande spécifiée.
     *
     * @param int $idDemande L'identifiant de la demande.
     * @return array L'identifiant du non-permanent correspondant.
     */
    public function getNPfromDemande($idDemande)
    {

        $sql = "SELECT idnonperm FROM demande WHERE idDemande = :idDemande ";

        try {
            $result = $this->queryAll($sql, array("idDemande" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    /**
     * Modifie l'identité d'un membre non permanent.
     * 
     * @param int $idnp L'identifiant du membre non permanent à modifier.
     * @param string $nom Le nouveau nom du membre non permanent.
     * @param string $prenom Le nouveau prénom du membre non permanent.
     * @param string $email Le nouvel email du membre non permanent.
     * @param string $nationalite La nouvelle nationalité du membre non permanent.
     * @param string $genre Le nouveau genre du membre non permanent.
     * @param string $tel Le nouveau numéro de téléphone du membre non permanent.
     * @return mixed Le résultat de la requête SQL ou une erreur.
     */
    public function updateChangedIdentity($idnp, $nom, $prenom, $email, $nationalite, $genre, $tel)
    {
        $obj = new DemandeDAO(false);
        $sql = "UPDATE  non_permanent set nomnp = :nom, prenomnp = :prenom, emailnp = :email, nationalite = :nationalite, genre = :genre , telephone = :tel where idnonperm = :id";
        try {
            $result = $this->queryAll($sql, array("nom" => $nom, "prenom" => $prenom, "email" => $email, "nationalite" => $nationalite, "genre" => $genre, "id" => $idnp, "tel" => $tel));
        } catch (Exception $e) {
            echo ("oups");
        }
        return $result;
    }



    public function getInfoDemande($idDemande)
    {
        $sql = "SELECT * from non_permanent, permanent, demande 
                        where demande.iddemande = :id 
                        and demande.idperm = permanent.idperm 
                        and demande.idnonperm = non_permanent.idnonperm ";

        try {
            $result = $this->queryAll($sql, array("id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }


    public function getDemandesNotFor($idPerm)
    {

        $sqlCurrent = "SELECT * FROM demande 
        JOIN permanent ON demande.idperm = permanent.idperm
        JOIN non_permanent ON demande.idnonperm = non_permanent.idnonperm
        WHERE demande.equipe NOT IN (SELECT axe.IDAXE FROM axe  WHERE axe.idpermgestionnaire = :id) 
        and demande.nbCompletedInfo = demande.nbRequiredInfo order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sqlCurrent, array("id" => $idPerm));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function getDemandesFor($idPerm)
    {
        $sqlCurrent = "SELECT * FROM demande 
        JOIN permanent ON demande.idperm = permanent.idperm
        JOIN non_permanent ON demande.idnonperm = non_permanent.idnonperm
        WHERE demande.equipe IN (SELECT axe.IDAXE FROM axe  WHERE axe.idpermgestionnaire = :id) 
        and demande.nbCompletedInfo = demande.nbRequiredInfo order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sqlCurrent, array("id" => $idPerm));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function enregistrerEtat($idDemande, $etat)
    {
        $sql = "UPDATE demande set etat_avancement = :etat where iddemande = :id";

        $strEtat = (string) $etat;
        try {
            $result = $this->queryAll($sql, array("etat" => $strEtat, "id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function getDateArrivee($idDemande)
    {
        $sql = "SELECT date_arrivee from demande where iddemande = :id";

        try {
            $result = $this->queryAll($sql, array("id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function getDateDepart($idDemande)
    {
        $sql = "SELECT date_depart from demande where iddemande = :id";

        try {
            $result = $this->queryAll($sql, array("id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }

    public function getCompleteEtatArrivee()
    {
        $sql = "SELECT * FROM non_permanent, permanent, demande 
                        WHERE permanent.idperm = demande.idperm 
                        AND nbRequiredInfo = nbCompletedInfo 
                        AND demande.idperm = permanent.idperm 
                        AND demande.idnonperm = non_permanent.idnonperm
                        and demande.etat_avancement = 'En attente de l\'arrivée'
                        order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, null);

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }


    public function getCompleteEtatDepart()
    {
        $sql = "SELECT * FROM non_permanent, permanent, demande 
                        WHERE permanent.idperm = demande.idperm
                        AND nbRequiredInfo = nbCompletedInfo 
                        AND demande.idperm = permanent.idperm 
                        AND demande.idnonperm = non_permanent.idnonperm
                        and demande.etat_avancement = 'Départ imminent'
                        order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, null);

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }


    public function getEffective()
    {
        $sql = "SELECT * FROM non_permanent, permanent, demande 
                        WHERE permanent.idperm = demande.idperm 
                        AND nbRequiredInfo = nbCompletedInfo 
                        AND demande.idperm = permanent.idperm 
                        AND demande.idnonperm = non_permanent.idnonperm
                        and demande.date_arrivee >= SYSDATE()
                        order by demande.iddemande asc";

        try {
            $result = $this->queryAll($sql, null);

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }



    public function deleteDemande($idDemande)
    {
        $sql = "DELETE FROM demande WHERE iddemande = :id";

        try {
            $result = $this->queryAll($sql, array("id" => $idDemande));

        } catch (Exception $e) {
            echo ("oups");
        }

        return $result;
    }


}



?>