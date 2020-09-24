<?php
    try {

        $conexion = new PDO('mysql:host=db;dbname=webapp', 'root', 'rootpass');

        $statement = $conexion->prepare("SELECT * FROM todo_item ORDER BY done, created_at");
        $statement->execute();

        $resultados = $statement->fetchAll();

    } catch (PDOException $exception){
        echo "Error: " . $exception->getMessage();
    }