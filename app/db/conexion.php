<?php

/**
 * Class conexion
 */
class conexion
{

    private static $_conexion;

    /**
     * @return PDO
     */
    public static function conectar()
    {
        if (!static::$_conexion){
            $host = getenv("DB_HOST");
            $user = getenv("DB_USER");
            $pass = getenv("DB_PASS");
            $port = getenv("DB_PORT");
            $database = getenv("DB_DATABASE");
            //$options[\PDO::ATTR_PERSISTENT]=true;

            $pdo = new PDO(sprintf('mysql:host=%s;dbname=%s;port=%d', $host, $database, $port), $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

            static::$_conexion = $pdo;

        }

        return static::$_conexion;

    }
}

