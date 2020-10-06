<?php

require_once '../vendor/autoload.php';

$controller = new \WebApp\controllers\cMain($_REQUEST['action']);
$controller->routes();
