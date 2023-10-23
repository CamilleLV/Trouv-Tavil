<?php
require('config.php');
require('DatabaseModel.php');
require('DatabaseController.php');

$model = new DatabaseModel($conn);
$controller = new DatabaseController($model);

$controller->handleRequest();
?>