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
                        <span class="tooltiptext">Pour les classer, Indiquez en dessous de chaques critères un nombre de
                            1 à 5 correspondant à leur importance selon vous (1 étant le plus importante) </span>
                    </div>
                </div>
                <div class="criteria-list">
                    <div class="criteria">
                        <input name="education" type="number" min="1" max="5" value="1" style="text-align: center;">
                        <div>
                            <label for="education">
                                Accès à l'école
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="cost" type="number" min="1" max="5" value="2" style="text-align: center;">
                        <div>
                            <label for="cost">
                                Coût du logement
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="transport" type="number" min="1" max="5" value="3" style="text-align: center;">
                        <div>
                            <label for="transport">
                                Transports (gare)
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="size" type="number" min="1" max="5" value="4" style="text-align: center;">
                        <div>
                            <label for="size">
                                Grande ville
                            </label>
                        </div>
                    </div>
                    <div class="criteria">
                        <input name="culture" type="number" min="1" max="5" value="5" style="text-align: center;">
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
                    <input type="text" placeholder="Search..">
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
                <h2>Notre manière de classer les villes</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris erat ipsum, venenatis vel ligula
                    viverra, vestibulum commodo metus. Pellentesque tempus pellentesque tortor, quis laoreet risus. Nunc
                    sollicitudin lacus et urna malesuada tristique. Maecenas aliquam ex lectus, eu luctus massa
                    imperdiet eget. Nunc malesuada commodo porttitor. Nulla viverra ligula eget nibh vehicula lacinia.
                    Etiam mattis rutrum risus ultricies scelerisque. Nam molestie lorem nulla, vitae sodales lectus
                    ullamcorper a. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec a interdum
                    sapien. Duis ac elementum nisi, non sagittis leo. Vivamus semper, orci nec hendrerit tempor, magna
                    dui ornare tellus, nec bibendum tortor lorem vitae leo. In varius nibh vitae massa pharetra lacinia.
                    Duis tincidunt justo eget commodo tempus. Maecenas laoreet fermentum sem ut cursus.
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