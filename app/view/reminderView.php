<br><br><br>

<div align="center">

    <h2>Recordar Contraseña</h2>

    <form action="reminder.php" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="submit" value="Enviar Correo">

        <?php
        if ($error != "") {
            echo "<p>$error</p>";
        }
        ?>

        <br><br><br>
        <input type="button" onclick="location.href='index.php?action=login'" value="Volver">
    </form>

</div>
