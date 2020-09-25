<?php

session_start();
require '../lib/Connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = limpiarDatos($_POST['usuario']);
    $passw = $_POST['password'];    //hash('md5', $_POST['password']);

    $statement = $conexion->prepare('SELECT username, contra FROM user WHERE username=:usuario and contra=:passw');
    $statement->execute(array(
        ':usuario' => $usuario,
        ':passw' => $passw,
    ));

    $resultado = $statement->fetch();

    if ($resultado !== false) {
        $_SESSION['nombre'] = $usuario;
        header('Location: index.php');
    } else {
        echo "Mal";
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
