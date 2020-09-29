<?php
session_start();

/**
 * Class listar
 */
class listar
{

    public function listado(){
        $nombre = $_SESSION['nombre'];
        $resultados = (new selects)->listarItems($nombre);

        $contador = 0;
        $resultados = listar::listado();

        while ($contador < count($resultados)) {
            echo "<tr>";
            echo "<td>";
            echo $resultados[$i]["id"];
            echo "</td>";
            echo "<td>";
            echo $resultados[$i]["title"];
            echo "</td>";
            echo "<td>";
            if ($resultados[$i]["done"] == 0) {
                echo "No";
            } else {
                echo "Si";
            }
            echo "</td>";
            echo "<td>";
            echo $resultados[$i]["created_at"];
            echo "</td>";
            echo "</tr>";
            $contador++;
        }
    }
}