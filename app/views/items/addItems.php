<?php require 'cabecera.php'; ?>
<style>
    <?php include '../views/estilo.css'?>
</style>

<br><br><br><br><br><br><br><br><br>

<div class="center">

    <form action="/items/add" method="post">
        <label for="title"></label>
        <input type="text" id="title" name="title" placeholder="Titulo">
        <label for="created_at"></label>
        <input type="text" id="created_at" name="created_at" placeholder="Fecha">
        <label for="done">Hecho</label>
        <input type="checkbox" id="done" name="done">
        <br><br>
        <input type="submit" value="Nuevo Item">
    </form>

    <?php
    if($param){echo "<br><br>" . $param;}
    echo $this->cargarView("../views/items/footerAdd.php");
    ?>
