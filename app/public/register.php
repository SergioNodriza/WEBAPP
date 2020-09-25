<?php

session_start();
require '../lib/Connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $usuario = limpiarDatos($_POST['usuario']);
    $passw = $_POST['password'];
    $passw2 = $_POST['password2'];

    $statement = $conexion->prepare('SELECT username FROM user WHERE username = :usuario');
    $statement->execute(array(
        ':usuario' => $usuario
    ));
    $validez = $statement->fetch();
    if ($validez != false) {
        $error = "El usuario ya existe";
    }

    if ($passw !== $passw2) {
        $error .= " Las contraseñas no coinciden";
    }


    if ($error == "") {

        $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");

        $statement2 = $conexion->prepare('INSERT INTO user (id, username, created_at, lastlogin_at, contra) 
                                                    VALUES (null, :usuario, :created_at, :lastlogin_at, :passw)');
        $statement2->execute(array(
            ':usuario' => $usuario,
            ':created_at' => $fecha,
            ':lastlogin_at' => $fecha,
            ':passw' => $passw
        ));

        $_SESSION['nombre'] = $usuario;
        header("Location: list-items.php");
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

require "../view/registerView.php";