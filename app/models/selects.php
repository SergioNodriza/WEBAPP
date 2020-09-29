<?php


/**
 * Class selects
 */
class selects
{
    protected $db;

    public function __construct()
    {
        $this->db = conexion::conectar();
    }


    /**
     * @param $nombre
     * @return array
     */
    public function listarItems($nombre)
    {
        $statement = $this->db->prepare("SELECT * FROM todo_item WHERE fkUser = (SELECT id FROM user 
                                                WHERE username = :nombreUsu) ORDER BY done, created_at");
        $statement->execute(array(
            ':nombreUsu' => $nombre
        ));

        return $statement->fetchAll();
    }

    /**
     * @param $nombre
     * @return mixed
     */
    public function selectID($nombre)
    {

        $statement = $this->db->prepare('SELECT id FROM user WHERE username = :nombreUsu');
        $statement->execute(array(
            ':nombreUsu' => $nombre
        ));

        return $statement->fetch();
    }

    /**
     * @param $title
     * @param $done
     * @param $created_at
     * @param $resul1
     * @return string
     */
    public function insertItemsID($title, $done, $created_at, $resul1)
    {
        $statement2 = $this->db->prepare('INSERT INTO todo_item (id, title, done, created_at, fkUser) 
                                                    VALUES (null, :title, :done, :created_at, :fkUser)');
        $statement2->execute(array(
            ':title' => $title,
            ':done' => $done,
            ':created_at' => $created_at,
            ':fkUser' => $resul1[0]
        ));

        return "Se ha introducido el articulo con titulo " . $title . ", hecho " . $done .
            ", fecha " . $created_at . " y con id " . $resul1[0];

    }

    /**
     * @param $usuario
     * @return mixed
     */
    public function comprobarUsuario($usuario)
    {
        $statement = $this->db->prepare('SELECT * FROM user WHERE username=:usuario');
        $statement->execute(array(
            ':usuario' => $usuario,
        ));

        return $statement->fetch();
    }


    public function actualizarLogin($fecha, $usuario)
    {
        $statement2 = $this->db->prepare('UPDATE user SET lastlogin_at = :hora where username = :usuario');
        $statement2->execute(array(
            ':hora' => $fecha,
            ':usuario' => $usuario
        ));
    }
}