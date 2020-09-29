<?php
session_start();

/**
 * Class login
 */
class login
{

    public function logear()
    {

        $usuario = (new helpLimpiar)->limpiarDatos($_POST['usuario']);
        $passw = $_POST['password'];

        $resultado = (new selects)->comprobarUsuario($usuario);

        if ($resultado !== false && password_verify($passw, $resultado['contra'])) {
            $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");

            (new selects)->actualizarLogin($fecha, $usuario);

            $_SESSION['nombre'] = $usuario;
            header('Location: index.php?action=list-items');
        } else {
            $error = "Error al iniciar Sesión";

            if ($error != "") {
                echo cargarView("../views/login.php");
                echo "<p align='center'>$error</p>";
            }
        }

    }
}