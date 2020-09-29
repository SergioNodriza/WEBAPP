<?php
session_start();

/**
 * Class login
 */
class login
{

    public function logear()
    {

        $usuario = limpiarDatos($_POST['usuario']);
        $passw = $_POST['password'];

        $resultado = selects::comprobarUsuario($usuario);

        if ($resultado !== false && password_verify($passw, $resultado['contra'])) {
            $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");

            selects::actualizarLogin($fecha, $usuario);
            $_SESSION['nombre'] = $usuario;
            header("Location: ../models/añadir.php");
        } else {
            $error = "Error al iniciar Sesión";
        }

    }
}