<?php


class register
{

    public function doRegist()
    {

        $usuario = (new helpLimpiar)->limpiarDatos($_POST['usuario']);
        $passw = $_POST['password'];
        $passw2 = $_POST['password2'];
        $cifrada = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($usuario !== "") {
            $resultado = (new selects)->comprobarUsuario($usuario);

            if ($resultado != false) {
                $error = "El usuario ya existe";
            }
        } else {
            $error = "Error de Usuario";
        }

        if ($passw !== $passw2) {
            $error .= " Las contraseñas no coinciden";
        }

        if (!isset($error)) {

            $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");
            (new selects)->insertUser($usuario, $fecha, $cifrada);

            $_SESSION['nombre'] = $usuario;
            header("Location: index.php?action=listItems");

        } else {
            echo cargarView("../views/register.php");
            echo "<p align='center'>$error</p>";
        }
    }
}