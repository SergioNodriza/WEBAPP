<?php

session_start();

$usuario = getenv("USU_SESSION");
$_SESSION['nombre'] = $usuario;

require "index.php";
