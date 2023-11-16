<?php
session_start();

require_once('./config/configuration.php');
require_once(PATH_TEXTES . 'lang.php');


if (isset($_GET['page'])) {

    $page = htmlspecialchars($_GET['page']); // http://.../index.php?page=toto
    if (is_file(PATH_CONTROLLERS . $_GET['page'] . ".php")) {
        if ($_GET['page'] == '') {
            $page = '';
        } elseif ($_GET['page'] == '') {
            $page = '';
        }
        require_once(PATH_CONTROLLERS . $page . '.php');
    }
} else {
    $page = 'test';
    require_once(PATH_CONTROLLERS . $page . '.php'); //appel du controller
}
