<?php
namespace WebApp\lib\db;

use PDO;

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
        if (!static::$_conexion) {
            $host = getenv("DB_HOST");
            $user = getenv("DB_USER");
            $pass = getenv("DB_PASS");
            $port = getenv("DB_PORT");
            $database = getenv("DB_DATABASE");
            $options[PDO::ATTR_PERSISTENT] = true;

            $pdo = new PDO (sprintf('mysql:host=%s;dbname=%s;port=%d', $host, $database, $port), $user, $pass, $options);

            static::$_conexion = $pdo;

        }

        return static::$_conexion;

    }
}

