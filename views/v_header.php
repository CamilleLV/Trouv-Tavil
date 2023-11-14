<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="./<?= PATH_BOOTSTRAP_CSS ?>bootstrap.css" rel="stylesheet">
    <link href="./<?= PATH_BOOTSTRAP_CSS ?>bootstrap-select.css" rel="stylesheet">

    <link href="./<?= PATH_CUSTOM_CSS ?>test.css" rel="stylesheet">
    <link href="./<?= PATH_CUSTOM_SCSS ?>custom.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">




    <script src="./<?= PATH_BOOTSTRAP_JS ?>bootstrap.bundle.js"></script>
    <script src="./<?= PATH_BOOTSTRAP_JS ?>bootstrap.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>




    <script src="./<?= PATH_BOOTSTRAP_JS ?>bootstrap-select.js"></script>
    <script src="./<?= PATH_CUSTOM_JS ?>form1.js"></script>
    <script src="./<?= PATH_CUSTOM_JS ?>completeForm.js"></script>
    <script src="./<?= PATH_CUSTOM_JS ?>addPermForm.js"></script>
    <script src="./<?= PATH_CUSTOM_JS ?>addFinancementForm.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>-->


    <title>Gerhard</title>
</head>

<body>

    <nav class="navbar sticky-top navbar-light bg-light">
        <div class="container-fluid">

            <div class="name">
                <?= $prenomperm . " " . $nomperm ?>
            </div>
            <div class="deconnect">
                <a href="index.php?page=connexion">
                    <?= $menu ?>
                </a>
            </div>


        </div>
    </nav>



    <?php require_once(PATH_CONTROLLERS . 'menu.php') ?>