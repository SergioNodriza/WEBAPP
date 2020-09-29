<?php require 'cabecera.php'; ?>

<br><br><br><br><br><br><br><br><br>

<div align="center">

    <form action="../models/añadir.php" method="post">
        <label for="title"></label>
        <input type="text" id="title" name="title" placeholder="Titulo">
        <label for="created_at"></label>
        <input type="text" id="created_at" name="created_at" placeholder="Fecha">
        <label for="done">Hecho</label>
        <input type="checkbox" id="done" name="done">
        <br><br>
        <input type="submit" value="Nuevo Item" onclick="añadirItem();">
    </form>

    <?php
    if ($error == true) {
        echo "<p>Ha ocurrido un error</p>";
    }
    if ($resul2 != "") {
        echo "<p>$resul2</p>";
    }
    ?>

    <br><br><br>
    <input type="button" onclick="location.href='index.php?action=list-items'" value="Volver">

</div>

</body>
</html>