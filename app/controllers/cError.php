<?php

namespace WebApp\controllers;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use WebApp\lib\views\baseView;

session_start();

/**
 * Class cError
 * @package WebApp\controllers
 */
class cError
{
    public function actionError() : ResponseInterface
    {
        $response = new Response();
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