<?php
require_once("../models/login.php");
require_once ("../models/helpLimpiar.php");
require_once ("../models/selects.php");

function doLog(){

    $a = new login();
    $a->logear();
}

/**
 * @param $vista
 * @return false|string
 */
function cargarView($vista){
    ob_start();
    include($vista);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
