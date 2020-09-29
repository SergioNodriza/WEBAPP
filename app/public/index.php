<?php
session_start();

require_once("../db/conexion.php");

if (isset($_SESSION['nombre'])) {
    require_once("../controllers/listar.php");
} else {
    require_once("../controllers/login.php");
}

