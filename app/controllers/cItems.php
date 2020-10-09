<?php

namespace WebApp\controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use WebApp\lib\views\baseView;
use WebApp\models\mItem;

session_start();

/**
 * Class cItems
 * @package WebApp\controllers
 */
class cItems
{

    public function actionListItems(): ResponseInterface
    {
        $response = new Response();

        if (isset($_SESSION['nombre'])) {
            $item = new mItem();
            $nombre = $_SESSION['nombre'];

            $action = $item->doList($nombre);
            $response->getBody()->write($action);
            return $response;
        }

        $vista = new baseView();
        $error = array(
            0 => "No se pudo listar, no hay sesión",
            1 => "Session"
        );
        $action = $vista->cargarView("../views/error/error.php", $error);
        $response->getBody()->write($action);
        return $response;
    }


    public function actionAddItems(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();

        if (isset($_SESSION['nombre'])) {
            if ($request->getMethod() == "POST") {

                $item = new mItem();
                $nombre = $_SESSION['nombre'];
                $title = $_POST['title'];
                $done = $_POST['done'];
                $created_at = $_POST['created_at'];
                $action = $item->doAdd($nombre, $title, $done, $created_at);

            } elseif ($request->getMethod() == "GET") {
                $vista = new baseView();
                $action = $vista->cargarView("../views/items/addItems.php");
            }
        } else {
            $vista = new baseView();
            $error = array(
                0 => "No se pudo añadir, no hay sesión",
                1 => "Session"
            );
            $action = $vista->cargarView("../views/error/error.php", $error);
        }
        $response->getBody()->write($action);
        return $response;
    }
}