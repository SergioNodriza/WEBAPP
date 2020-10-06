<?php
namespace WebApp\models;

/**
 * Class items
 */
class mItem
{


    /**
     * @param $nombre
     * @return false|string
     */
    public function doList($nombre)
    {
        $resultados = (new selects())->listarItems($nombre);

        $contador = 0;

        if ($resultados == false) {
            $param = "<td colspan='4'>No hay Items</td></table>";
            return (new baseView())->cargarView("../views/items/listItems.php", $param);
        } else {
            $param = "";

            while ($contador < count($resultados)) {
                $param .= "<tr><td>";
                $param .= $resultados[$contador]["id"];
                $param .= "</td><td>";
                $param .= $resultados[$contador]["title"];
                $param .= "</td><td>";
                if ($resultados[$contador]["done"] == 0) {
                    $param .= "No";
                } else {
                    $param .= "Si";
                }
                $param .= "</td><td>";
                $param .= $resultados[$contador]["created_at"];
                $param .= "</td></tr>";
                $contador++;
            }
            $param .= "</table>";
            return (new baseView())->cargarView("../views/items/listItems.php", $param);
        }
    }


    /**
     * @param $nombre
     * @param $title
     * @param $done
     * @param $created_at
     * @return false|string
     */
    public function doAdd($nombre, $title, $done, $created_at)
    {
        if ($done === "on") {
            $doneBool = 1;
        } else {
            $doneBool = 0;
        }

        if ($title === "" || $created_at === "") {
            $error = "Error al añadir";
            return (new baseView())->cargarView("../views/items/addItems.php", $error);
        } else {

            $resul1 = (new selects())->selectID($nombre);
            $resul2 = "<p>" . (new selects())->insertItemsID($title, $doneBool, $created_at, $resul1) . "</p>";
            return (new baseView())->cargarView("../views/items/addItems.php", $resul2);
        }
    }
}