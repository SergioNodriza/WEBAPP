<?php


class añadir
{
    private $db;

    public function __construct()
    {
        $this->db = conexion::conectar();
    }
    
    public function añadirItem()
    {

        $error = false;

        if (!$_SESSION) {
            header('Location: ../index.php');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre = $_SESSION['nombre'];
            $title = limpiarDatos(['title']);
            if ($_POST['done'] === "on") {
                $done = 1;
            } else {
                $done = 0;
            }
            $created_at = limpiarDatos(['created_at']);

            if ($title === "" || $created_at === "") {
                $error = true;
            } else {

                $resul1 = selects::selectID($nombre);
                $resul2 = selects::itemsID($title, $done, $created_at, $resul1);

            }
        }
    }
}