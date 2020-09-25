<?php require 'header.php'; ?>

<br><br><br><br><br><br><br><br><br>

<div align="center">

    <form action="add-item.php" method="post">
        <label for="title"></label>
        <input type="text" id="title" name="title" placeholder="Titulo"><br><br>
        <label for="done">Hecho</label>
        <input type="checkbox" id="done" name="done"><br><br>
        <label for="created_at"></label>
        <input type="text" id="created_at" name="created_at" placeholder="Fecha"><br><br>
        <input type="submit" value="Nuevo Item">
    </form>

    <?php
    if ($error == true) {
        echo "<p>Ha ocurrido un error</p>";
    }
    if ($resul2 != "") {
        echo "<p>$resul2</p>";
    }
    ?>

    <p><a href="list-items.php">Volver</a></p>

</div>

</body>
</html>