<?php

//use WebApp\controllers\cMain;

use Laminas\Diactoros\ServerRequestFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use League\Route\Router;

require_once '../vendor/autoload.php';

/*$router = new cMain($_REQUEST['action'] ?? null);
$response = $router->dispatch();

if ($response) {
    echo $response;
}*/

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST
);
$router = new Router();

$router->map('GET', '/', function (ServerRequestInterface $request) : ResponseInterface {
    $response = new Laminas\Diactoros\Response();
    $response->getBody()->write('<h1>Hello, World!</h1>');
    return $response;
});

$response = $router->dispatch($request);

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);