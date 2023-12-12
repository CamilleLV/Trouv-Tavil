<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./<?= PATH_CSS ?>style.css" rel="stylesheet">

    <title>Trouv'tavil</title>
</head>

<body>
    <div id="sticky">
        <a href="./">
    <img src="assets\img\logo.png" width="75px" height="75px"/>
</a>
        <h1 id="titleTrouv">Trouv'</h1><h1 id="titleTavil">Tavil</h1>
    </div>
    <header>
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
                    <?php

                // Remplacer cette partie avec le code pour charger les données JSON
                $data = json_decode(file_get_contents('assets\json\departements-region.json'), true);

                // Regrouper les départements par région
                $regions = [];
                foreach ($data as $entry) {
                    $regions[$entry['region_name']][] = $entry;
                }
                
                // Créer la liste déroulante HTML
                echo '<form action="traitement.php" method="post">';
                echo '<select name="departement">';
                echo '<option value="France">Toute la france</option>';
                foreach ($regions as $region => $departements) {
                    echo '<optgroup label="' . htmlspecialchars($region) . '">';
                    foreach ($departements as $departement) {
                        echo '<option value="' . htmlspecialchars($departement['num_dep']) . '">' . htmlspecialchars($departement['dep_name']) . '</option>';
                    }
                    echo '</optgroup>';
                }
                echo '</select>';

                ?>
                </div>

                <div class="slidecontainer">
                    <p>nombre d'habitants : </p>
                    <p><span id="value1"></span></p>
                    <div class="slider" id="slider">
                        <div class="slider-track"></div>
                        <div class="slider-range" id="slider-range"></div>
                        <div class="slider-thumb" id="thumb1"></div>
                        <div class="slider-thumb" id="thumb2"></div>
                    </div>
                    <p><span id="value2"></span></p>
                    <input type="hidden" id="inputValue1" name="habMin">
                    <input type="hidden" id="inputValue2" name="habMax">
                    <script>
                        var slider = document.getElementById('slider');
                        var range = document.getElementById('slider-range');
                        var thumb1 = document.getElementById('thumb1');
                        var thumb2 = document.getElementById('thumb2');
                        var value1 = document.getElementById('value1');
                        var value2 = document.getElementById('value2');

                        var min = 0;
                        var max = 2500000;

                        thumb1.style.left = '0px';
                        thumb2.style.left = slider.offsetWidth - thumb2.offsetWidth + 'px';
                        updateRange();

                        thumb1.addEventListener('mousedown', function(event) {
                            window.addEventListener('mousemove', onMouseMove1);
                            window.addEventListener('mouseup', onStopMove);
                        });

                        thumb2.addEventListener('mousedown', function(event) {
                            window.addEventListener('mousemove', onMouseMove2);
                            window.addEventListener('mouseup', onStopMove);
                        });

                        function onMouseMove1(event) {
                            var newLeft = event.clientX - slider.getBoundingClientRect().left - thumb1.offsetWidth / 2;
                            newLeft = Math.min(newLeft, parseInt(thumb2.style.left) - thumb1.offsetWidth);
                            newLeft = Math.max(newLeft, 0);

                            thumb1.style.left = newLeft + 'px';
                            updateRange();
                        }

                        function onMouseMove2(event) {
                            var newLeft = event.clientX - slider.getBoundingClientRect().left - thumb2.offsetWidth / 2;
                            newLeft = Math.max(newLeft, parseInt(thumb1.style.left) + thumb2.offsetWidth);
                            newLeft = Math.min(newLeft, slider.offsetWidth - thumb2.offsetWidth);

                            thumb2.style.left = newLeft + 'px';
                            updateRange();
                        }

                        function onStopMove() {
                            window.removeEventListener('mousemove', onMouseMove1);
                            window.removeEventListener('mousemove', onMouseMove2);
                            window.removeEventListener('mouseup', onStopMove);
                        }

                        function updateRange() {
                            var leftValue = Math.round((parseInt(thumb1.style.left) / slider.offsetWidth) * max);
                            var rightValue = Math.round((parseInt(thumb2.style.left) / slider.offsetWidth) * max);

                            value1.textContent = leftValue;
                            value2.textContent = rightValue;

                            range.style.left = thumb1.style.left;
                            range.style.right = slider.offsetWidth - thumb2.offsetLeft - thumb2.offsetWidth + 'px';

                            document.getElementById('inputValue1').value = leftValue;
                            document.getElementById('inputValue2').value = rightValue;
                        }
                    </script>
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
                        var_dump($_POST);
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