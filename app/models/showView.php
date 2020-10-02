<?php


/**
 * Class showView
 */
class showView
{

    /**
     * @param $vista
     */
    public function cargarView($vista)
    {
        ob_start();
        include($vista);
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    /**
     * @param $vista
     * @param $footer
     */
    public function cargarFooter($vista, $footer)
    {
        ob_start();
        include($vista);
        include($footer);
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    /**
     * @param $vista
     * @param $param
     * @param $footer
     */
    public function cargarAll($vista, $param, $footer)
    {
        ob_start();
        include($vista);
        echo "<br><br>$param";
        include($footer);
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
}