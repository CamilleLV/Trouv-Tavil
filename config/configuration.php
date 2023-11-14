<?php

const DEBUG = true; // production : false; dev : true

// Accès base de données
const BD_HOST = 'localhost';
const BD_DBNAME = 'gerhard';
const BD_USER = 'dev'; //gerhard-usr //dev
const BD_PWD = 'x6xDWpiq)68.F4vP'; //GesThi9786Mon  //x6xDWpiq)68.F4vP


// Langue du site
const LANG = 'FR-fr';





//dossiers racines du site
define('PATH_CONTROLLERS', './controllers/c_');
define('PATH_ENTITY', './entities/');
define('PATH_MODELS', './models/');
define('PATH_ASSETS', './assets/');
define('PATH_VIEWS', './views/v_');
define('PATH_TEXTES', './languages/');
define('PATH_ONESHEET', './onesheet-1.2.4/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS . 'css/');
define('PATH_IMAGES', PATH_ASSETS . 'images/');
define('PATH_SCRIPTS', PATH_ASSETS . 'scripts/');

//
define('PATH_BOOTSTRAP_CSS', PATH_ASSETS . 'bootstrap/scss/');
define('PATH_BOOTSTRAP_JS', PATH_ASSETS . 'bootstrap/js/');
define('PATH_BOOTSTRAP_FONTS', PATH_ASSETS . 'bootstrap/static/fonts/');

//
define('PATH_BOOTSTRAP_SASS', PATH_ASSETS . 'bootstrap/sass/');
define('PATH_BOOTSTRAP_SASS_MIX', PATH_ASSETS . 'bootstrap/sass/mixins/');
define('PATH_BOOTSTRAP_SASS_UTIL', PATH_ASSETS . 'bootstrap/sass/utilities/');

define('PATH_CUSTOM_CSS', PATH_ASSETS . 'custom/css/');
define('PATH_CUSTOM_JS', PATH_ASSETS . 'custom/js/');
define('PATH_CUSTOM_SCSS', PATH_ASSETS . 'custom/scss/');


//fichiers
define('PATH_MENU', PATH_VIEWS . 'menu.php');

?>