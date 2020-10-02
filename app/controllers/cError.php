<?php


class cError
{

    /**
     * @param $vista
     * @return false|string
     */
    public function cargarError($vista)
    {
        ob_start();
        include($vista);
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
}