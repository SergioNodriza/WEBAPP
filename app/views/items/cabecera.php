<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Titulo</title>
</head>
<body>
<div class="left">

    <h3><?php
        echo "Usuario: " . $_SESSION['nombre'];
        ?>
    </h3>

    <input type="button" onclick="location.href='index.php?action=logOut'" value="Log Out">

</div>

