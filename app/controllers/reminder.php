<?php
require_once("../models/reminder.php");
require_once("../models/helpLimpiar.php");
require_once("../models/selects.php");

function doReminder(){

    $a = new reminder();
    $a->remind();
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