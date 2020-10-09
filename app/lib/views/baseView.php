<?php

namespace WebApp\lib\views;

/**
 * Class showView
 */
class baseView
{

    /**
     * @param $vista
     */
    public function cargarView($vista, $param = [])
    {
        ob_start();
        include($vista);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}