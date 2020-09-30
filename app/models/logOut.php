<?php

/**
 * Class cerrar
 */
class logOut
{

    public function cierre(){
        session_start();
        session_destroy();
        header('Location: index.php?action=index');
    }
}