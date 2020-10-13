<?php

namespace WebApp\controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use WebApp\helpers\request;
use WebApp\lib\views\baseView;
use WebApp\models\mUser;

session_start();

/**
 * Class cUsers
 * @package WebApp\controllers
 */
class cUsers
{

    public function actionLogIn(ServerRequestInterface $request): ResponseInterface
    {
        $user = new mUser();
        $vista = new baseView();
        $response = new Response();

        if ($request->getMethod() == "POST") {
            $usuario = (new request())->limpiarDatos($_POST['usuario']);
            $passw = (new request())->limpiarDatos($_POST['password']);
            $action = $user->doLogIn($usuario, $passw);

        } elseif ($request->getMethod() == "GET") {
            if (isset($_SESSION['nombre'])) {header("Location: /items/list");}
            else {$action = $vista->cargarView("../views/users/logIn.php");}
        }
        $response->getBody()->write($action);
        return $response;
    }

    public function actionLogOut()
    {
        $user = new mUser();
        $user->doLogOut();
    }


    public function actionReminder(ServerRequestInterface $request): ResponseInterface
    {
        $user = new mUser();
        $vista = new baseView();
        $response = new Response();

        if ($request->getMethod() == "POST") {
            $usuario = (new request())->limpiarDatos($_POST['usuario']);
            $action = $user->doRemind($usuario);

        } elseif ($request->getMethod() == "GET") {
            $action = $vista->cargarView("../views/users/reminder.php");
        }

        $response->getBody()->write($action);
        return $response;
    }


    public function actionRegister(ServerRequestInterface $request): ResponseInterface
    {

        $user = new mUser();
        $vista = new baseView();
        $response = new Response();

        if ($request->getMethod() == "POST") {
            $usuario = (new request())->limpiarDatos($_POST['usuario']);
            $passw = $_POST['password'];
            $passw2 = $_POST['password2'];
            $action = $user->doRegist($usuario, $passw, $passw2);

        } elseif ($request->getMethod() == "GET") {
            $action = $vista->cargarView("../views/users/register.php");
        }

        $response->getBody()->write($action);
        return $response;
    }

}