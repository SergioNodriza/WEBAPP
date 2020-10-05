<?php


class request
{
    /**
     * @param $datos
     * @return string
     */
    public function limpiarDatos($datos)
    {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }
}