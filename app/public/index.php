<?php
session_start();

if (isset($_SESSION['nombre'])){
    require '../view/list-itemsView.php';
}

else {
    require '../view/loginView.php';
}
