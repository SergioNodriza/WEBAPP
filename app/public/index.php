<?php
session_start();

require_once("../db/conexion.php");

if ($_REQUEST['action']) {
    switch ($_REQUEST['action']) {

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

        case "cerrar":
            require_once("../controllers/cerrar.php");
            break;

        case "list-items":
            if (!$_SESSION) {
                require_once("../controllers/error.php");
            } else {
                require_once("../controllers/listar.php");
            }
            break;

        case "add-item":
            if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
                require_once("../controllers/añadir.php");
                doAdd();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                if (!$_SESSION) {
                    require_once("../controllers/error.php");
                } else {
                    require_once("../controllers/añadir.php");
                    echo cargarView("../views/añadir.php");
                }
            }
            break;

        case "register":
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                require_once("../controllers/registrar.php");
                doRegist();
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                require_once("../controllers/registrar.php");
                echo cargarView("../views/registrar.php");
            }
            break;

        case "reminder":
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                require_once("../controllers/recordar.php");
                doReminder();
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                require_once("../controllers/recordar.php");
                echo cargarView("../views/recordar.php");
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

