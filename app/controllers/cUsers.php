<?php
require_once("../models/mUser.php");
require_once("../models/helpLimpiar.php");
require_once("../models/selects.php");

/**
 * Class cUsers
 */
class cUsers
{

    public function login()
    {
        $user = new mUser();
        $user->doLogIn();
    }


    public function logout()
    {
        $user = new mUser();
        $user->doLogOut();
    }

    public function regist()
    {
        $user = new mUser();
        $user->doRegist();
    }

    public function remind()
    {
        $user = new mUser();
        $user->doRemind();
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