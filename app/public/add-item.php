<?php

require '../lib/Connection.php';
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

        $statement = $conexion->prepare('INSERT INTO todo_item (id, title, done, created_at) VALUES (null, :title, :done, :created_at)');
        $statement->execute(array(
            ':title' => $title,
            ':done' => $done,
            ':created_at' => $created_at
        ));

        $resul = "Se ha introducido el articulo con titulo " . $title . ", hecho " . $done . " y fecha " . $created_at;
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

require '../view/add.php';


