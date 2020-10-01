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

        if($resultados == false){
            echo $this->cargarView("../views/items/listItemsError.php");
        } else {
            echo $this->cargarView("../views/items/listItems.php");

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
            echo "</table>";
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
            echo $this->cargarView("../views/items/addItemsError.php");
        } else {

            $resul1 = (new selects())->selectID($nombre);
            $resul2 = (new selects())->insertItemsID($title, $done, $created_at, $resul1);
            echo $this->cargarView("../views/items/addItems.php");
            echo "<p align='center'>$resul2</p>";

        }
    }

    /**
     * @param $vista
     * @return false|string
     */
    public function cargarView($vista)
    {
        ob_start();
        include($vista);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }


}