<?php

/**
 * Class cerrar
 */
class cerrar
{

    public function cierre(){
        session_start();
        session_destroy();
        header('Location: index.php?action=index');
    }
}