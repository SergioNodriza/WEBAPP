<?php

/**
 * Class user
 */
class mUser
{

    /**
     * @param $usuario
     * @param $passw
     * @return false|string|void
     */
    public function doLogIn($usuario, $passw)
    {
        $resultado = (new selects())->comprobarUsuario($usuario);

        if ($resultado !== false && password_verify($passw, $resultado['contra'])) {
            $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");

            (new selects())->actualizarLogin($fecha, $usuario);

            $_SESSION['nombre'] = $usuario;
            header('Location: index.php?action=listItems');
        } else {
            $error = "Error al iniciar Sesión";
            return (new baseView())->cargarView("../views/users/logIn.php", $error);
        }
        return;
    }

    public function doLogOut()
    {
        session_start();
        session_destroy();
        header('Location: index.php?action=logIn');
    }


    /**
     * @param $usuario
     * @param $passwd
     * @param $passwd2
     * @return false|string|void
     */
    public function doRegist($usuario, $passwd, $passwd2)
    {
        $cifrada = password_hash($passwd, PASSWORD_DEFAULT);

        if ($usuario !== "") {
            $resultado = (new selects())->comprobarUsuario($usuario);

            if ($resultado != false) {
                $error = "El usuario ya existe";
            }
        } else {
            $error = "Error de Usuario";
        }

        if ($passwd !== $passwd2) {
            $error .= " Las contraseñas no coinciden";
        }

        if (!isset($error)) {

            $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");
            (new selects())->insertUser($usuario, $fecha, $cifrada);

            $_SESSION['nombre'] = $usuario;
            header("Location: index.php?action=listItems");

        } else {
            return (new baseView())->cargarView("../views/users/register.php", $error);
        }
        return;
    }


    /**
     * @param $usuario
     * @return false|string
     */
    public function doRemind($usuario)
    {
        $error = "Introduzca un usuario";

        if ($usuario != "") {
            $resultado = (new selects())->comprobarUsuario($usuario);

            if ($resultado == false) {
                $error = "No existe ese usuario";
                return (new baseView())->cargarView("../views/users/reminder.php", $error);

            } else {

                $newpass = mt_rand(1, 999);
                $mensaje = "Hola " . $usuario . " tu nueva contraseña es: " . $newpass;

                mail('sergio.gomez@nodrizatech.com', 'Contraseña Renovada', '$mensaje');

                return (new baseView())->cargarView("../views/users/reminder.php", "Correo Enviado");
            }
        } else {
            return (new baseView())->cargarView("../views/users/reminder.php", $error);
        }
    }
}