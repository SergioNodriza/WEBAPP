<?php
session_start();
require '../lib/Connection.php';

if (isset($_SESSION['nombre'])){
    require '../view/list-itemsView.php';
}

else {
    require '../view/header.php';
}




