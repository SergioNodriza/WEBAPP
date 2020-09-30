<?php
session_start();

/**
 * Class listar
 */
class listItems
{

    public function listado()
    {
        $nombre = $_SESSION['nombre'];
        $resultados = (new selects)->listarItems($nombre);

        $contador = 0;

        while ($contador < count($resultados)) {
            echo "<tr>";
            echo "<td>";
            echo $resultados[$contador]["id"];
            echo "</td>";
            echo "<td>";
            echo $resultados[$contador]["title"];
            echo "</td>";
            echo "<td>";
            if ($resultados[$contador]["done"] == 0) {
                echo "No";
            } else {
                echo "Si";
            }
            echo "</td>";
            echo "<td>";
            echo $resultados[$contador]["created_at"];
            echo "</td>";
            echo "</tr>";
            $contador++;
        }
    }
}