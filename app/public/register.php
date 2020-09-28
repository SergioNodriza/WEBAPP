<?php

session_start();
require '../lib/Connection.php';
$conexion = conectar();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $usuario = limpiarDatos($_POST['usuario']);
    $passw = $_POST['password'];
    $passw2 = $_POST['password2'];
    $cifrada= password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($usuario !== "") {
        $statement = $conexion->prepare('SELECT username FROM user WHERE username = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario
        ));
        $validez = $statement->fetch();

        if ($validez != false) {
            $error = "El usuario ya existe";
        }
    } else {
        $error = "Error de Usuario";
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
            ':passw' => $cifrada
        ));

        $_SESSION['nombre'] = $usuario;
        header("Location: index.php?action=list-items");
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