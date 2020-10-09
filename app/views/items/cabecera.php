<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Titulo</title>
</head>
<style>
    <?php include '../views/estilo.css'?>
</style>
<body>
<div class="left">

    <h3><?php
        echo "Usuario: " . $_SESSION['nombre'];
        ?>
    </h3>

    <input type="button" onclick="location.href='/users/logout'" value="Log Out">

</div>

