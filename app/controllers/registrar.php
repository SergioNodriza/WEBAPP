<?php
require_once ("../models/registrar.php");
require_once ("../models/helpLimpiar.php");
require_once ("../models/selects.php");

function doRegist() {
    $a = new registrar();
    $a -> regist();
}

function cargarView($vista){
    ob_start();
    include("../views/registrar.php");
    $output= ob_get_contents();
    ob_end_clean();
    return $output;
}