
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Titulo</title>
</head>
<body>
<div align="left">

    <h3><?php
        if (isset($_SESSION['nombre'])) {
            echo "Usuario: " . $_SESSION['nombre'];
        } else {
            echo "No hay sesión iniciada";
        }
        ?>
    </h3>

    <input type="button" onclick="location.href='index.php?action=cerrar'" value="Log Out">

</div>

