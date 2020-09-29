<?php
session_start();

class añadir
{

    public function nuevoItem()
    {

        $nombre = $_SESSION['nombre'];
        $title = ['title'];
        if ($_POST['done'] === "on") {
            $done = 1;
        } else {
            $done = 0;
        }
        $created_at = ['created_at'];

        if ($title === "" || $created_at === "") {
            echo cargarView("../views/añadir.php");
            echo "<p align='center'>Ha ocurrido un error</p>";
        } else {

            $resul1 = (new selects)->selectID($nombre);
            $resul2 = (new selects)->insertItemsID($title, $done, $created_at, $resul1);
            echo cargarView("../views/añadir.php");
            echo "<p align='center'>$resul2</p>";

        }

    }
}