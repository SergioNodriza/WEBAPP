<?php

namespace WebApp\controllers;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use WebApp\lib\views\baseView;

session_start();

/**
 * Class cError
 * @package WebApp\controllers
 */
class cError
{
    public function actionError(ServerRequestInterface $request) : ResponseInterface
    {
        $response = new \Laminas\Diactoros\Response();
        $vista = new baseView();
        $error = array(
            0 => "Página no encontrada",
            1 => "NotFound"
        );
        $action = $vista->cargarView("../views/error/error.php", $error);
        $response->getBody()->write($action);
        return $response;
    }
}