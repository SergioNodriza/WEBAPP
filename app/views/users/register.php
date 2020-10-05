<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<style>
    <?php include '../views/estilo.css'?>
</style>
<body>
<br><br><br>

<div class="center">

    <h2>Registrar Usuario</h2>

    <form action="index.php?action=register" method="post">
        <label>
            <input type="text" name="usuario" placeholder="Usuario">
        </label>
        <label>
            <input type="password" name="password" placeholder="Contraseña">
        </label>
        <label>
            <input type="password" name="password2" placeholder="Repetir Contraseña">
        </label>
        <input type="submit" value="Registrar">

        <?php
        if($param){echo "<br><br>" . $param;}
        echo $this->cargarView("../views/users/footerVolver.php");
        ?>