<?php
session_start();

function conectar()
{
    try {

        $host = getenv("DB_HOST");
        $user = getenv("DB_USER");
        $pass = getenv("DB_PASS");
        $port = getenv("DB_PORT");
        $database = getenv("DB_DATABASE");

        $conexion = new PDO(sprintf('mysql:host=%s;dbname=%s;port=%d', $host, $database, $port), $user, $pass);

    } catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
    }

    return $conexion;
}

/**
 * @param $conexion
 * @return string
 */
function datos($conexion){
    $statement = $conexion->prepare("SELECT * FROM todo_item WHERE fkUser = (SELECT id FROM user 
                                                WHERE username = :nombreUsu) ORDER BY done, created_at");
    $statement->execute(array(
        ':nombreUsu' => $_SESSION['nombre']
    ));

    $resultados = $statement->fetchAll();

    return $resultados;
}