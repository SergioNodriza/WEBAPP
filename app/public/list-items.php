<?php

session_start();

if (isset($_SESSION['nombre'])) {
    require '../view/list-itemsView.php';
}

else {
    header('Location: index.php?action=error.php');
}

