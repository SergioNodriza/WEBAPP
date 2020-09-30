<?php
require_once ("../models/register.php");
require_once ("../models/helpLimpiar.php");
require_once ("../models/selects.php");

function doRegist() {
    $a = new register();
    $a -> doRegist();
}

function cargarView($vista){
    ob_start();
    include($vista);
    $output= ob_get_contents();
    ob_end_clean();
    return $output;
}