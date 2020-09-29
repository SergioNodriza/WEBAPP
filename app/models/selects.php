<?php


/**
 * Class selects
 */
class selects
{


    private $db;

    public function __construct()
    {
        $this->db = conexion::conectar();
    }


    /**
     * @param $nombre
     * @return Generator
     */
    public function listarItems($nombre)
    {
        $statement = conexion::conectar()->prepare("SELECT * FROM todo_item ");

       // $statement->bindValue(':nombreUsu',$nombre);

        $statement->execute();

        while($row = $statement->fetch()){
            yield $row;
        }

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