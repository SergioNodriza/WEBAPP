<?php
require_once("../models/mUser.php");
require_once("../models/helpLimpiar.php");
require_once("../models/selects.php");
require_once("../models/showView.php");

/**
 * Class cUsers
 */
class cUsers extends cMain
{
    public function address2()
    {
        $user = new mUser();
        $vista = new showView();
        switch($this->request){

            case "logIn":
                if ($_POST){
                    $user->doLogIn();
                }
                elseif ($_GET){
                    $vista->cargarFooter("../views/users/logIn.php", "../views/users/footerLogIn.php");
                }

                break;

            case "logOut":
                    $user->doLogOut();
                break;

            case "register":
                if ($_POST){
                    $user->doRegist();
                }
                elseif ($_GET){
                    $vista->cargarFooter("../views/users/register.php", "../views/users/footerVolver.php");
                }
                break;

            case "reminder":
                if ($_POST){
                    $user->doRemind();
                }
                elseif ($_GET){
                    $vista->cargarFooter("../views/users/reminder.php", "../views/users/footerVolver.php");
                }
                break;
        }
    }
}