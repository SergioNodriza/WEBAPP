<?php

/**
 * Class items
 */
class mItem
{

    public function doList()
    {
        $nombre = $_SESSION['nombre'];
        $resultados = (new selects())->listarItems($nombre);

        $contador = 0;

        if ($resultados == false) {
            $param = "<td colspan='4'>No hay Items</td></table>";
            (new showView())->cargarAll("../views/items/listItems.php", $param, "../views/items/footerList.php");
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
            (new showView())->cargarAll("../views/items/listItems.php", $param, "../views/items/footerList.php");
        }
    }

    public function doAdd()
    {

        $nombre = $_SESSION['nombre'];
        $title = $_POST['title'];
        if ($_POST['done'] === "on") {
            $done = 1;
        } else {
            $done = 0;
        }
        $created_at = $_POST['created_at'];

        if ($title === "" || $created_at === "") {
            (new showView())->cargarView("../views/items/addItemsError.php");
        } else {

            $resul1 = (new selects())->selectID($nombre);
            $resul2 = "<p>" . (new selects())->insertItemsID($title, $done, $created_at, $resul1) . "</p>";
            (new showView())->cargarAll("../views/items/addItems.php", $resul2, "../views/items/footerAdd.php");

        }
    }
}