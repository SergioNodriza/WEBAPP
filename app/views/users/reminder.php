<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reminder</title>
</head>
<style>
    <?php include '../views/estilo.css'?>
</style>
<body>
<br><br><br>

<div class="center">

    <h2>Recordar Contraseña</h2>

    <form action="index.php?action=reminder" method="post">
        <label>
            <input type="text" name="usuario" placeholder="Usuario">
        </label>
        <input type="submit" value="Enviar Correo">

        <?php
        if($param){echo "<br><br>" . $param;}
        echo $this->cargarView("../views/users/footerVolver.php");
        ?>
