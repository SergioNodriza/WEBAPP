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

            if ($error != "") {
                echo $this->cargarView("../views/logIn.php");
                echo "<p align='center'>$error</p>";
            }
        }

    }

    public function doLogOut()
    {
        session_start();
        session_destroy();
        header('Location: index.php?action=index');
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
            echo $this->cargarView("../views/register.php");
            echo "<p align='center'>$error</p>";
        }
    }

    public function doRemind()
    {
        $usuario = (new helpLimpiar())->limpiarDatos($_POST['usuario']);

        if ($usuario != "") {
            $resultado = (new selects())->comprobarUsuario($usuario);

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
            echo $this->cargarView("../views/reminder.php");
            echo "<p align='center'>$error</p>";
        }
    }

    /**
     * @param $vista
     * @return false|string
     */
    public function cargarView($vista)
    {
        ob_start();
        include($vista);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}