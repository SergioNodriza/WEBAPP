<?php
require_once("../models/mItem.php");
require_once("../models/helpLimpiar.php");
require_once("../models/selects.php");

/**
 * Class cItems
 */
class cItems
{

    public function listar()
    {
        $item = new mItem();
        $item->doList();
    }


    public function add()
    {
        $item = new mItem();
        $item->doAdd();
    }

    /**
     * @param $vista
     * @return false|string
     */
    public function cargarView($vista)
    {
        ob_start();
        include($vista);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}