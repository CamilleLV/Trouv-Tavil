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
    <img src="<?= PATH_IMAGES ?>logo.png" width="75px" height="75px"/>
</a>
        <h1 id="titleTrouv">Trouv'</h1><h1 id="titleTavil">Tavil</h1>
    </div>
    <header>
        <form method="POST" action="">
            <div>
                <div class="criteria-list">
                <?php
                    $criteres_disponibles = [
                        "none" => 'Aucun',
                        "education" => "Accès à l'école",
                        "soins" => "Accès aux soins",
                        "festival" => "Ville festive",
                        "logement" => "Coût du logement",
                        "gare" => "Proximité d'une gare",
                        "musee" => "Musées présents",
                        "association" => "Ville associative",
                        "chomage" => "Dynamisme économique",
                        "fibre" => "Ville fibrée",
                        "soleil" => "Ensoleillement"
                    ];

                    for ($i = 1; $i <= 5; $i++) {
                        $nom_cle = 'critere' . $i;
                        echo '<div class="criteria">';
                        echo '<label for="' . $nom_cle . '">Critère n°' . $i . '</label>';
                        echo '<select name="' . $nom_cle . '" id="' . $nom_cle . '">';

                        // Options de la liste déroulante
                        foreach ($criteres_disponibles as $cle => $valeur) {
                            echo '<option value="' . $cle . '">' . $valeur . '</option>';
                        }

                        echo '</select></div><br>';
                    }
                    ?>
                    <script>
                        const comboBoxes = [
                        document.getElementById('critere1'),
                        document.getElementById('critere2'),
                        document.getElementById('critere3'),
                        document.getElementById('critere4'),
                        document.getElementById('critere5'),
                        ];

                        function updateOptionStates() {
                        const selectedValues = [];

                        comboBoxes.forEach(comboBox => {
                            Array.from(comboBox.options).forEach(option => {
                            if (option.selected && option.value !== "none") {
                                console.log(option.value)
                                selectedValues.push(option.value);
                            }
                            });
                        });

                        comboBoxes.forEach(comboBox => {
                            Array.from(comboBox.options).forEach(option => {
                            option.disabled = selectedValues.includes(option.value) && !option.selected;
                            });
                        });
                        }

                        comboBoxes.forEach(comboBox => {
                        comboBox.addEventListener('change', updateOptionStates);
                        });

                        updateOptionStates();
                        </script>
                </div>
                <div id="geographic-searchbar">
                    <div class="geo-text">
                        Zone géographique
                    </div>
                    <div class="geo-input">
                        <?php
                        $data = json_decode(file_get_contents(PATH_JSON.'departements-region.json'), true);
                        $regions = [];
                        foreach ($data as $entry) {
                            $regions[$entry['region_name']][] = $entry;
                        }
                
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
                </div>

                <div class="slidecontainer">
                    <p class="nb-hab">Nombre d'habitants </p>
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

                            if(leftValue>=1000000){
                                value1.textContent = Math.round(leftValue/100000)/10+" M";
                            }else{
                                value1.textContent = Math.round(leftValue/1000)+" K";
                            }
                            if(rightValue>=1000000){
                                value2.textContent = Math.round(rightValue/100000)/10+" M"; 
                            }else{
                                value2.textContent = Math.round(rightValue/1000)+" K"; 
                            }

                            range.style.left = thumb1.style.left;
                            range.style.right = slider.offsetWidth - thumb2.offsetLeft - thumb2.offsetWidth + 'px';

                            document.getElementById('inputValue1').value = Math.round(leftValue/1000)*1000 ;
                            document.getElementById('inputValue2').value =  Math.round(rightValue/1000)*1000;
                        }
                    </script>
                </div>
                <div class="centered">
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
                        if (empty($result)) {
                            echo "Aucun résultat";
                        } else {
                            foreach ($result as $ville) {
                                $nomville = $ville['COM'];
                                ?>
                                <li><a target="_blank" href="https://fr.wikipedia.org/wiki/<?= $nomville ?>">
                                        <?= $nomville ?>
                                    </a></li>
                                <?php
                            }
                        }
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
    <?php
    require_once(PATH_VIEWS."footer.php");
    ?>
</body>