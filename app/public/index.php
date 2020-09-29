<?php
session_start();

require_once("../db/conexion.php");

if ($_REQUEST['action']) {
    switch ($_REQUEST['action']) {

        case "list-items":
            require_once("../controllers/listar.php");
            break;

        case "cerrar":
            require_once("../controllers/cerrar.php");
            break;

        case "add-item":
            if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
                require_once("../controllers/añadir.php");
                doAdd();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once("../controllers/añadir.php");
                echo cargarView("../views/añadir.php");
            }
            break;

        case "login":

            if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
                require_once("../controllers/login.php");
                doLog();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once("../controllers/login.php");
                echo cargarView("../views/login.php");
            }
            break;

        default:
            header('Location: index.php');
            break;
    }
} elseif (isset($_SESSION['nombre'])) {
    require_once("../controllers/listar.php");
} else {
    require_once("../controllers/login.php");
    echo cargarView("../views/login.php");
}

