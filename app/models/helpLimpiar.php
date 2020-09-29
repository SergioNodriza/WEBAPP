<?php


class helpLimpiar
{
    /**
     * @param $datos
     * @return string
     */
    function limpiarDatos($datos)
    {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }
}