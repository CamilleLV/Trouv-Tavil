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
                    <select placeholder="Search..">
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
                <h2>Bienvenus sur Trouv'tavil</h2>
                <p>
                Trouv'tavil est une plateforme qui vous permet de trouver la ville qui vous ressemble. Nous vous offrons la 
                possibilité de choisir votre futur lieu de vie en fonction de vos préférences et de vos envies, rapidement 
                et facilement. 
                Nous avons classé pour vous les meilleures villes françaises pour vous installer, en prenant en compte des 
                critères jugés importants par les français, comme le coût du logement, l'accès à l'école ou encore les 
                transports en commun.
                    <br>
                    Nam convallis ac urna quis sagittis. Phasellus suscipit finibus tellus, ullamcorper venenatis justo
                    volutpat ac. Nunc fermentum a urna id auctor. Fusce ac nulla vel risus ornare pulvinar. Nam lacinia
                    porttitor purus a molestie. Ut sed dui imperdiet, pulvinar velit sit amet, fermentum turpis. Duis
                    dapibus imperdiet nulla et venenatis. Cras posuere nulla eget tortor tincidunt, sed suscipit purus
                    rutrum. Nunc mattis felis sed leo porttitor venenatis ut a mauris. Morbi vulputate tempus odio et
                    lobortis. Sed rhoncus diam quis arcu blandit, vel sodales sem tristique. Suspendisse eget turpis id
                    lacus malesuada iaculis.
                    <br>
                    Morbi sodales, turpis vel fermentum consequat, orci dui convallis leo, eu molestie sem neque id
                    mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec finibus pulvinar leo, eu
                    dignissim purus malesuada et. In sed feugiat tortor, dignissim fringilla risus. Curabitur posuere,
                    odio et varius interdum, dolor dolor ultricies urna, id posuere nulla mi vel nulla. Integer sit amet
                    iaculis est, vel dignissim felis. Mauris neque ex, tristique sit amet quam sit amet, bibendum
                    accumsan magna. Mauris vulputate arcu id metus egestas, elementum malesuada erat sagittis. Donec eu
                    dui nulla. Cras tempus, justo non vestibulum rhoncus, ligula risus consectetur nisi, eleifend
                    dignissim nisl odio et purus. Curabitur ante justo, blandit non quam eu, commodo rutrum risus. Nulla
                    mollis scelerisque porta. Morbi elementum ipsum metus, et ornare tortor consequat a. Aliquam
                    porttitor odio justo, ac blandit augue pharetra eu. Donec cursus velit auctor mauris aliquet
                    ultricies. Fusce tincidunt massa nisi, in rhoncus tellus congue id.
                </p>
            </div>
        </div>
    </main>
</body>