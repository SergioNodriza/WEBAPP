<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>logIn</title>
</head>
<style>
    <?php include '../views/estilo.css'?>
</style>
<body>
<br><br><br>

<div class="center">

    <h2>Iniciar Sesion</h2>

    <form action="index.php?action=logIn" method="post">
        <label>
            <input type="text" name="usuario" placeholder="Usuario">
        </label>
        <label>
            <input type="password" name="password" placeholder="Contraseña">
        </label>
        <input type="submit" value="Iniciar Sesion">

        <?php
        if($param){echo "<br><br>" . $param;}
        echo $this->cargarView("../views/users/footerLogIn.php");
        ?>