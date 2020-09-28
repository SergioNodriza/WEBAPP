<?php

session_start();
require '../lib/Connection.php';
$conexion = conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = limpiarDatos($_POST['usuario']);
    $passw = $_POST['password'];

    $statement = $conexion->prepare('SELECT * FROM user WHERE username=:usuario');
    $statement->execute(array(
        ':usuario' => $usuario,
    ));

    $resultado = $statement->fetch();

    if ($resultado !== false && password_verify($passw, $resultado['contra'])){

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
