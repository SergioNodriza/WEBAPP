<?php
namespace WebApp\controllers;

use WebApp\helpers\request;
use WebApp\lib\views\baseView;
use WebApp\models\mUser;

/**
 * Class cUsers
 */
class cUsers extends cMain
{

    /**
     * @return false|string|void
     */
    public function actionLogIn()
    {
        $user = new mUser();
        $vista = new baseView();

        if ($_POST) {
            $usuario = (new request())->limpiarDatos($_POST['usuario']);
            $passw = (new request())->limpiarDatos($_POST['password']);
            return $user->doLogIn($usuario, $passw);
        } elseif ($_GET) {
            return $vista->cargarView("../views/users/logIn.php");
        }
    }

    public function actionLogOut()
    {
        $user = new mUser();
        $user->doLogOut();
    }

    /**
     * @return false|string
     */
    public function actionReminder()
    {
        $user = new mUser();
        $vista = new baseView();

        if ($_POST) {
            $usuario = (new request())->limpiarDatos($_POST['usuario']);
            return $user->doRemind($usuario);
        } elseif ($_GET) {
            return $vista->cargarView("../views/users/reminder.php");
        }
    }

    /**
     * @return false|string|void
     */
    public function actionLRegister()
    {

        $user = new mUser();
        $vista = new baseView();

        if ($_POST) {
            $usuario = (new request())->limpiarDatos($_POST['usuario']);
            $passw = $_POST['password'];
            $passw2 = $_POST['password2'];
            return $user->doRegist($usuario, $passw, $passw2);
        } elseif ($_GET) {
            return $vista->cargarView("../views/users/register.php");
        }
    }
}