<?php

use WebApp\controllers\cMain;

require_once '../vendor/autoload.php';

$controller = new cMain($_REQUEST['action']);
$controller->routes();
