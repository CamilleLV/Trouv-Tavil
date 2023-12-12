<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./<?= PATH_CSS ?>style.css" rel="stylesheet">

    <title>Trouv'tavil</title>
</head>

<body>
    <header>
        <h1>Trouv'Tavil</h1>
        <form method="POST">
            <div>
                <h2>Recherche</h2>
                <div style="display: flex;">
                    <h3>
                        Mes critères :
                    </h3>
                    <div class="tooltip">?
                        <span class="tooltiptext">Pour faire une recherche ciblée, cochez un ou plusieurs cirtères, 
                            renseignez une zone goégraphique et faites glisser le curseur du nombre d'habitants</span>
                    </div>
                </div>
                <div class="criteria-list">
                    <div class="criteria">
                        <input name="education" type="checkbox" style="text-align: center;">
                        <div>
                            <label for="education">
                                Accès à l'école
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="cost" type="checkbox" style="text-align: center;">
                        <div>
                            <label for="cost">
                                Coût du logement
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="transport" type="checkbox" style="text-align: center;">
                        <div>
                            <label for="transport">
                                Transports (gare)
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="size" type="checkbox" style="text-align: center;">
                        <div>
                            <label for="size">
                                Grande ville
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="culture" type="checkbox" style="text-align: center;">
                        <div>
                            <label for="culture">
                                Culture
                            </label>
                        </div>
                    </div>
                </div>
                <!--
                <input type="checkbox" name="hierarchy" />
                <label for="hierarchy">
                    Hiérarchiser mes critères
                </label>
    -->
                <div id="geographic-searchbar">
                    <button>
                        Zone géographique
                    </button>
                    <select placeholder="Search...">
                        <option value="all">Toute la France</option>
                    </select>
                </div>

                <div class="slidecontainer">
                    <p>Nombre d'habitants</p>
                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                </div>
                <div div="centered">
                    <input type="submit" class="research" value="Recherche rapide" name="submit">

                    </input>
                </div>

            </div>
        </form>
    </header>
    <main>
        <div class="resultat">
            <div class="left">
                <h2>Résultats</h2>
                <ul>
                    <?php
                    if (isset($_POST['submit'])) {
                        
                    }
                    foreach ($result as $ville) {

                        $nomville = $ville['LIB_Commune'];
                        /*$prenomnp = $demande['PRENOMNP'];
                        $nbrequired = $demande['NBREQUIREDINFO'];
                        $nbcomplete = $demande['NBCOMPLETEDINFO'];
                        $creator = $demande['CREATEUR'];
                        $idperm = $demande['IDPERM'];*/
                        ?>
                        <li><a target="_blank" href="https://fr.wikipedia.org/wiki/">
                                <?= $nomville ?>
                            </a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="right">
                <h2>Bienvenus sur Trouv'tavil !</h2>
                <p>
                Trouv'tavil, la plateforme idéale pour trouver la ville parfaite où vous installer ! 
                Notre site simplifie le processus de sélection en vous permettant de sélectionner des critères 
                précis tels que la taille de la population, la localisation géographique, le coût de la vie... 
                En quelques clics, découvrez une liste de villes correspondant exactement à vos préférences. 
                Trouv'tavil rend le choix de votre prochain lieu de vie aussi simple que personnalisé. 
                Préparez-vous à explorer et à trouver la ville qui répond à tous vos critères.
                </p>
                <br>
                <h2>Notre manière de classer les villes</h2>
                <p>
                Nos données sont issues des données publiques sur les 35 000 communes françaises. Nous avons 
                déterminé 5 critères principaux, et pertinents, pour choisir de s'installer dans une nouvelle ville.
                Notre recherche consiste ensuite à récupérer les communes possédant le plus de critères en communs avec 
                votre sélection, afin de vous proposer un résultat au plus proche de votre demande.
                </p> 
            </div>
        </div>
    </main>
</body>