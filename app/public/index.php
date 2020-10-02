<?php
session_start();
require_once("../db/conexion.php");
require_once("../controllers/cMain.php");

$controller = new cMain($_REQUEST['action']);
$controller->address();

