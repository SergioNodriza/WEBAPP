<?php

/**
 * Class user
 */
class mUser
{

    public function doLogIn()
    {

        $usuario = (new helpLimpiar())->limpiarDatos($_POST['usuario']);
        $passw = $_POST['password'];

        $resultado = (new selects())->comprobarUsuario($usuario);

        if ($resultado !== false && password_verify($passw, $resultado['contra'])) {
            $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");

            (new selects())->actualizarLogin($fecha, $usuario);

            $_SESSION['nombre'] = $usuario;
            header('Location: index.php?action=listItems');
        } else {
            $error = "Error al iniciar Sesión";
            (new showView())->cargarAll("../views/users/logIn.php", $error, "../views/users/footerLogIn.php");
        }

    }

    public function doLogOut()
    {
        session_start();
        session_destroy();
        header('Location: index.php?action=logIn');
    }

    public function doRegist()
    {

        $usuario = (new helpLimpiar())->limpiarDatos($_POST['usuario']);
        $passw = $_POST['password'];
        $passw2 = $_POST['password2'];
        $cifrada = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($usuario !== "") {
            $resultado = (new selects())->comprobarUsuario($usuario);

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
            (new selects())->insertUser($usuario, $fecha, $cifrada);

            $_SESSION['nombre'] = $usuario;
            header("Location: index.php?action=listItems");

        } else {
            (new showView())->cargarAll("../views/users/register.php", $error, "../views/users/footerVolver.php");
        }
    }

    public function doRemind()
    {
        $usuario = (new helpLimpiar())->limpiarDatos($_POST['usuario']);
        $error = "Introduzca un usuario";

        if ($usuario != "") {
            $resultado = (new selects())->comprobarUsuario($usuario);

            if ($resultado == false) {
                $error = "No existe ese usuario";
                (new showView())->cargarAll("../views/users/reminder.php", $error, "../views/users/footerVolver.php");

            } else {

                $newpass = mt_rand(1, 999);
                $mensaje = "Hola " . $usuario . " tu nueva contraseña es: " . $newpass;

                mail('sergio.gomez@nodrizatech.com', 'Contraseña Renovada', '$mensaje');

                (new showView())->cargarAll("../views/users/reminder.php", "Correo Enviado", "../views/users/footerVolver.php");
            }
        } else {
            (new showView())->cargarAll("../views/users/reminder.php", $error, "../views/users/footerVolver.php");
        }
    }
}