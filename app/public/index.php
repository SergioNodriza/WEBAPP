<?php
session_start();

require_once("../db/conexion.php");

if ($_REQUEST['action']) {
    switch ($_REQUEST['action']) {

        case "logIn":

            if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
                require_once("../controllers/logIn.php");
                doLog();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once("../controllers/logIn.php");
                echo cargarView("../views/logIn.php");
            }
            break;

        case "logOut":
            require_once("../controllers/logOut.php");
            break;

        case "listItems":
            if (!$_SESSION) {
                require_once("../controllers/error.php");
            } else {
                require_once("../controllers/listItems.php");
            }
            break;

        case "addItems":
            if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
                require_once("../controllers/addItems.php");
                doAdd();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                if (!$_SESSION) {
                    require_once("../controllers/error.php");
                } else {
                    require_once("../controllers/addItems.php");
                    echo cargarView("../views/addItems.php");
                }
            }
            break;

        case "register":
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                require_once("../controllers/register.php");
                doRegist();
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                require_once("../controllers/register.php");
                echo cargarView("../views/register.php");
            }
            break;

        case "reminder":
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                require_once("../controllers/reminder.php");
                doReminder();
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                require_once("../controllers/reminder.php");
                echo cargarView("../views/reminder.php");
            }
            break;

        default:
            header('Location: index.php');
            break;
    }

} elseif (isset($_SESSION['nombre'])) {
    require_once("../controllers/listItems.php");
} else {
    require_once("../controllers/logIn.php");
    echo cargarView("../views/logIn.php");
}

