<?php require 'cabecera.php'; ?>
<style>
    <?php include '../views/estilo.css'?>
</style>

<br><br><br><br><br><br><br>

<div class="center">
    <table class="center">

        <thead>

        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Hecho</th>
            <th>Fecha Creación</th>
        </tr>

        </thead>

        <tbody>
        <?php if($param){echo "<br><br>" . $param;}?>
        </tbody>

        <tfoot>
        <?php echo $this->cargarView("../views/items/footerList.php");?>
        </tfoot>
