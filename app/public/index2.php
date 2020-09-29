<?php
session_start();

if ($_REQUEST['action']) {
    switch ($_REQUEST['action']) {

        case "list-items":
            header('Location: list-items.php');
            break;

        case "add-item":
            header('Location: add-item.php');
            break;

        case "login":
            header('Location: login.php');
            break;

        case "register":
            header('Location: register.php');
            break;

        case "reminder":
            header('Location: reminder.php');
            break;

        case "cerrar":
            header('Location: cerrar.php');
            break;

        case "error":
            header('Location: error.php');
            break;

        default:
            header('Location: index.php');
            break;
    }
}

if (isset($_SESSION['nombre'])) {
    require 'list-items.php';
} else {
    require '../view/loginView.php';
}


