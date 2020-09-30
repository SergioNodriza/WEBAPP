<?php


class recordar
{

    public function remind()
    {
        $usuario = (new helpLimpiar)->limpiarDatos($_POST['usuario']);

        if ($usuario != "") {
            $resultado = (new selects)->comprobarUsuario($usuario);

            if ($resultado == false) {
                $error = "No existe ese usuario";
            } else {

                $newpass = mt_rand(1, 999);
                $mensaje = "Hola " . $usuario . " tu nueva contraseña es: " . $newpass;

                mail('sergio.gomez@nodrizatech.com', 'Contraseña Renovada', '$mensaje');

                $error = "Correo Enviado";
            }
        } else {
            $error = "Error de usuario";
        }

        if (isset($error)) {
            echo "<p>$error</p>";
        }
    }
}