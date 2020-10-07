<?php

use WebApp\controllers\cMain;

require_once '../vendor/autoload.php';

$router = new cMain($_REQUEST['action'] ?? null);
$response = $router->dispatch();

if ($response) {
    echo $response;
}
