<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select</title>
</head>
<body>

<br><br><br><br><br><br><br><br><br>

<div align="center" ">

<form action="add-item.php" method="post">
    <input type="text" id="title" name="title" placeholder="Titulo"><br><br>
    <label for="done">Hecho</label>
    <input type="checkbox" id="done" name="done"><br><br>
    <input type="text" id="created_at" name="created_at" placeholder="Fecha"><br><br>
    <input type="submit" value="Nuevo Item">
</form>

<?php
    if($error == true){echo "<p>Ha ocurrido un error</p>";}
    if ($resul != ""){echo "<p>$resul</p>";}
?>

<p><a href="list-items.php">Volver</a></p>

</div>

</body>
</html>