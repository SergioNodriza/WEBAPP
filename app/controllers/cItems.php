<?php
namespace WebApp\controllers;

use WebApp\lib\views\baseView;
use WebApp\models\mItem;

/**
 * Class cItems
 */
class cItems extends cMain
{
    /**
     * @param $session
     * @return false|string
     */
    public function actionList($session)
    {

        if ($session) {
            $item = new mItem();
            $nombre = $_SESSION['nombre'];
            return $item->doList($nombre);
        } else {
            $vista = new baseView();
            return $vista->cargarView("../views/error.php");
        }
    }


    /**
     * @param $session
     * @return false|string
     */
    public function actionAdd($session)
    {

        if ($session) {
            if ($_POST) {

                $item = new mItem();
                $nombre = $_SESSION['nombre'];
                $title = $_POST['title'];
                $done = $_POST['done'];
                $created_at = $_POST['created_at'];
                return $item->doAdd($nombre, $title, $done, $created_at);

            } elseif ($_GET) {
                $vista = new baseView();
                return $vista->cargarView("../views/items/addItems.php");
            }
        } else {
            $vista = new baseView();
            return $vista->cargarView("../views/error.php");
        }


    }
}