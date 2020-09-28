<?php
session_start();

require '../lib/Connection.php';
$conexion = conectar();


if (!$_SESSION || !$conexion) {
    header('Location: error.php');
}

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = limpiarDatos($_POST['title']);
    if ($_POST['done'] === "on") {
        $done = 1;
    } else {
        $done = 0;
    }
    $created_at = limpiarDatos($_POST['created_at']);

    if ($title === "" || $created_at === "") {
        $error = true;
    } else {

        $statement = $conexion->prepare('SELECT id FROM user WHERE username = :nombreUsu');
        $statement->execute(array(
            ':nombreUsu' => $_SESSION['nombre']
        ));
        $resul1 = $statement->fetch();              //Coger la id del usuario para darle luego el item

        $statement2 = $conexion->prepare('INSERT INTO todo_item (id, title, done, created_at, fkUser) 
                                                    VALUES (null, :title, :done, :created_at, :fkUser)');
        $statement2->execute(array(
            ':title' => $title,
            ':done' => $done,
            ':created_at' => $created_at,
            ':fkUser' => $resul1[0]
        ));

        $resul2 = "Se ha introducido el articulo con titulo " . $title . ", hecho " . $done .
                                                    ", fecha " . $created_at . " y con id " . $resul1[0];
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

require '../view/addView.php';


