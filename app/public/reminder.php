<?php

require '../lib/Connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = limpiarDatos($_POST['usuario']);

    if ($usuario !== "") {
        $statement = $conexion->prepare('SELECT username FROM user WHERE username = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario
        ));
        $validez = $statement->fetch();

        if ($validez == false) {
            $error = "No existe ese usuario";
        } else {

            $newpass = mt_rand(1, 999);
            $mensaje = "Hola " . $usuario . " tu nueva contraseña es: " . $newpass;

            mail('sergio.gomez@nodrizatech.com', 'Contraseña Renovada', '$mensaje');



     /*       $statement2 = $conexion->prepare('UPDATE user SET contra = :newpass where username = :usuario');
            $statement2->execute(array(
                ':newpass' => $newpass,
                ':usuario' => $usuario
            ));
*/
            $error = "Correo Enviado";
        }

    } else {
        $error = "Error de usuario";
    }
}

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

require '../view/reminderView.php';