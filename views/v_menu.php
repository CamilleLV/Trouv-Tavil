<nav>
    <div class="bg-light border-right navNative position-fixed pt-5">
        <div class="list-group list-group-flush mt-5">
            <?php
            if (htmlspecialchars($_GET['page']) === 'dashboard') {
                ?>
                <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"
                    aria-current="true">
                    Mon tableau de bord
                </a>
                <?php
            } else {
                ?>
                <a href="index.php?page=dashboard" class="list-group-item list-group-item-action">
                    Mon tableau de bord
                </a>
                <?php
            }
            ?>

            <?php
            if (htmlspecialchars($_GET['page']) === 'demandeNew') {
                ?>
                <a href="index.php?page=demandeNew" class="list-group-item list-group-item-action active"
                    aria-current="true">
                    Nouvelle demande
                </a>
                <?php
            } else {
                ?>
                <a href="index.php?page=demandeNew" class="list-group-item list-group-item-action">
                    Nouvelle demande
                </a>
                <?php
            }
            ?>

            <?php
            if ($isFromService) {
                if (htmlspecialchars($_GET['page']) === 'demandes') {
                    ?>
                    <a href="index.php?page=demandes" class="list-group-item list-group-item-action active" aria-current="true">
                        Mes demandes <span class="badge bg-secondary mx-2">
                            <?= $nombre ?>
                        </span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?page=demandes" class="list-group-item list-group-item-action">
                        Mes demandes <span class="badge bg-primary mx-2">
                            <?= $nombre ?>
                        </span>
                    </a>
                    <?php
                }
            } else {
                # code...
            }

            ?>

            <?php
            if (htmlspecialchars($_GET['page']) === 'effectifs') {
                ?>
                <a href="index.php?page=effectifs" class="list-group-item list-group-item-action active"
                    aria-current="true">
                    Voir les effectifs
                </a>
                <?php
            } else {
                ?>
                <a href="index.php?page=effectifs" class="list-group-item list-group-item-action">
                    Voir les effectifs
                </a>
                <?php
            }
            ?>

            <?php
            /*
            if (htmlspecialchars($_GET['page']) === 'statistiques') {
                ?>
                <a href="index.php?page=statistiques" class="list-group-item list-group-item-action active"
                    aria-current="true">
                    Statistiques
                </a>
                <?php
            } else {
                ?>
                <a href="index.php?page=statistiques" class="list-group-item list-group-item-action">
                    Statistiques
                </a>
                <?php
            }
            */
            ?>



            <?php
            if ($admin) {
                if (htmlspecialchars($_GET['page']) === 'listeDemandes') {
                    ?>
                    <a href="index.php?page=listeDemandes" class="list-group-item list-group-item-action active"
                        aria-current="true">
                        Liste des demandes
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?page=listeDemandes" class="list-group-item list-group-item-action">
                        Liste des demandes
                    </a>
                    <?php
                }


                if (htmlspecialchars($_GET['page']) === 'administration') {
                    ?>
                    <a href="index.php?page=administration" class="list-group-item list-group-item-action active"
                        aria-current="true">
                        Administration
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?page=administration" class="list-group-item list-group-item-action">
                        Administration
                    </a>
                    <?php
                }


                if (htmlspecialchars($_GET['page']) === 'calendrier') {
                    ?>
                    <a href="index.php?page=calendrier" class="list-group-item list-group-item-action active"
                        aria-current="true">
                        Calendrier
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?page=calendrier" class="list-group-item list-group-item-action">
                        Calendrier
                    </a>
                    <?php
                }

            }


            if (isset($_SESSION['service']) && $_SESSION['service'] === 3004) {
                if (htmlspecialchars($_GET['page']) === 'administration') {
                    ?>
                    <a href="index.php?page=administration" class="list-group-item list-group-item-action active"
                        aria-current="true">
                        Administration
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?page=administration" class="list-group-item list-group-item-action">
                        Administration
                    </a>
                    <?php
                }
            }


            ?>




        </div>
</nav>