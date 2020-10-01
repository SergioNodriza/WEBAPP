<?php require 'cabecera.php'; ?>
<style>
    <?php include '../views/estilo.css'?>
</style>

<br><br><br><br><br><br><br><br><br>

<div class="center">

    <form action="index.php?action=addItems" method="post">
        <label for="title"></label>
        <input type="text" id="title" name="title" placeholder="Titulo">
        <label for="created_at"></label>
        <input type="text" id="created_at" name="created_at" placeholder="Fecha">
        <label for="done">Hecho</label>
        <input type="checkbox" id="done" name="done">
        <br><br>
        <input type="submit" value="Nuevo Item">
    </form>

    <br><br><br>
    <input type="button" onclick="location.href='index.php?action=listItems'" value="Volver">

</div>

</body>
</html>