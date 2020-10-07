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
     * @return false|string
     */
    public function actionListItems()
    {
        if (isset($_SESSION['nombre'])) {
            $item = new mItem();
            $nombre = $_SESSION['nombre'];

            return $item->doList($nombre);
        }

        $vista = new baseView();
        return $vista->cargarView("../views/error.php");
    }


    /**
     * @return false|string
     */
    public function actionAddItems()
    {
        if (isset($_SESSION['nombre'])) {
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