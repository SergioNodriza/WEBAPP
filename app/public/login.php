<?php

session_start();
require '../lib/Connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = limpiarDatos($_POST['usuario']);
    $passw = $_POST['password']; //hash('md5', $_POST['password']);

    $statement = $conexion->prepare('SELECT username, contra FROM user WHERE username=:usuario and contra=:passw');
    $statement->execute(array(
        ':usuario' => $usuario,
        ':passw' => $passw
    ));

    $resultado = $statement->fetch();

    if ($resultado !== false) {

        $fecha = date("yy" . "-" . "m" . "-" . "d" . " " . "h" . "-" . "i" . "-" . "s");

        $statement2 = $conexion->prepare('UPDATE user SET lastlogin_at = :hora where username = :usuario');
        $statement2->execute(array(
            ':hora' => $fecha,
            ':usuario' => $usuario
        ));

        $_SESSION['nombre'] = $usuario;
        header('Location: index.php');

    } else {
        $error = "Error al iniciar Sesión";
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

require "../view/loginView.php";
