<?php
require_once("../models/mItem.php");
require_once("../models/helpLimpiar.php");
require_once("../models/selects.php");
require_once("../models/showView.php");

/**
 * Class cItems
 */
class cItems extends cMain
{
    public function address2()
    {
        $item = new mItem();
        $vista = new showView();
        switch($this->request){

            case "listItems":
                    $item->doList();
                break;

            case "addItems":
                if ($_POST){
                    $item->doAdd();
                }
                elseif ($_GET){
                    $vista->cargarFooter("../views/items/addItems.php", "../views/items/footerAdd.php");
                }
                break;
        }
    }
}