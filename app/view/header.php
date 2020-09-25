<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Titulo</title>
</head>
<body>
<div align="left">
    <h3><?php
        if(isset($_SESSION['nombre'])){echo "Usuario: " . $_SESSION['nombre'];}
        else {echo "No hay sesión iniciada";}
        ?>
    </h3>
    <input type="button" onclick="location.href=
    '<?php
    if(isset($_SESSION['nombre'])){echo "index.php";}
    else {echo "login.php";}
    ?>'
    " value="Log in">
    <br>
    <input type="button" onclick="location.href='cerrar.php'" value="Log Out">

</div>

