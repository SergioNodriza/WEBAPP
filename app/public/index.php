<?php

use Laminas\Diactoros\ServerRequestFactory;
use League\Route\RouteGroup;
use League\Route\Router;

require_once '../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST
);
$router = new Router();

$router->group("/users", function (RouteGroup $route) {
    $route->map("GET", "/login", "\WebApp\controllers\cUsers::actionLogIn");
    $route->map("POST", "/login", "\WebApp\controllers\cUsers::actionLogIn");
    $route->map("GET", "/logout", "\WebApp\controllers\cUsers::actionLogOut");
    $route->map("GET", "/reminder", "\WebApp\controllers\cUsers::actionReminder");
    $route->map("POST", "/reminder", "\WebApp\controllers\cUsers::actionReminder");
    $route->map("GET", "/register", "\WebApp\controllers\cUsers::actionRegister");
    $route->map("POST", "/register", "\WebApp\controllers\cUsers::actionRegister");
});

$router->group("/items", function (RouteGroup $route) {
    $route->map("GET", "/list", "\WebApp\controllers\cItems::actionListItems");
    $route->map("POST", "/list", "\WebApp\controllers\cItems::actionListItems");
    $route->map("GET", "/add", "\WebApp\controllers\cItems::actionAddItems");
    $route->map("POST", "/add", "\WebApp\controllers\cItems::actionAddItems");
});

$router->map("GET", "/", "\WebApp\controllers\cUsers::actionLogIn");
$router->map("GET", "/error", "\WebApp\controllers\cError::actionError");


try {
    $response = $router->dispatch($request);
    (new Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
} catch (Exception $exception) {
    header("Location: /error");
}