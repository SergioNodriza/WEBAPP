<?php require 'cabecera.php'; ?>

<br><br><br><br><br><br><br><br><br>

<div align="center">
    <table border="1" style="text-align:center ">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Hecho</th>
            <th>Fecha Creación</th>
        </tr>

        <?php
        (new listar)->listado();
        ?>

    </table>

    <br>
    <input type="button" onclick="location.href='index.php?action=add-item'" value="Añadir Item">

</div>

</body>
</html>

