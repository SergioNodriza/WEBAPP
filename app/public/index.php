<?php
session_start();
require_once("../db/conexion.php");
require_once("../controllers/cError.php");
require_once("../controllers/cUsers.php");
require_once("../controllers/cItems.php");

if ($_REQUEST['action']) {
    switch ($_REQUEST['action']) {

        case "logIn":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $cUser = new cUsers();
                $cUser->login();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $cUser = new cUsers();
                echo $cUser->cargarView("../views/logIn.php");
            }
            break;

        case "logOut":
            $cUser = new cUsers();
            $cUser->logout();
            break;

        case "listItems":
            if (!$_SESSION) {
                $cError = new cError();
                echo $cError->cargarView("../views/error.php");
            } else {
                $cItem = new cItems();
                echo $cItem->cargarView("../views/listItems.php");
                $cItem->listar();
            }
            break;

        case "addItems":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $cItem = new cItems();
                $cItem->add();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                if (!$_SESSION) {
                    $cError = new cError();
                    echo $cError->cargarView("../views/error.php");
                } else {
                    $cItem = new cItems();
                    echo $cItem->cargarView("../views/addItems.php");
                }
            }
            break;

        case "register":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cUser = new cUsers();
                $cUser->regist();
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                require_once("../controllers/cUsers.php");
                $cUser = new cUsers();
                echo $cUser->cargarView("../views/register.php");
            }
            break;

        case "reminder":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cUser = new cUsers();
                $cUser->remind();
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $cUser = new cUsers();
                echo $cUser->cargarView("../views/reminder.php");
            }
            break;

        default:
            header('Location: index.php');
            break;
    }

} elseif (isset($_SESSION['nombre'])) {
    header('Location: index.php?action=listItems');
} else {
    $cUser = new cUsers();
    echo $cUser->cargarView("../views/logIn.php");
}

