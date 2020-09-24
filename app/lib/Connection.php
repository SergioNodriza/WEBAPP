<?php

    try {

        $host = getenv("DB_HOST");
        $user = getenv("DB_USER");
        $pass = getenv("DB_PASS");
        $port = getenv("DB_PORT");
        $database = getenv("DB_DATABASE");

        $conexion = new PDO(sprintf('mysql:host=%s;dbname=%s;port=%d', $host, $database, $port), $user, $pass);

        $statement = $conexion->prepare("SELECT * FROM todo_item ORDER BY done, created_at");
        $statement->execute();

        $resultados = $statement->fetchAll();

    } catch (PDOException $exception){
        echo "Error: " . $exception->getMessage();
    }