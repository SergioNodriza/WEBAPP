<br><br><br>

<div align="center">

    <h2>Registrar Usuario</h2>

    <form action="register.php" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="password" name="password2" placeholder="Repetir Contraseña">
        <input type="submit" value="Registrar">

        <?php

        if ($error != "") {
            echo "<p>$error</p>";
        }
        ?>

        <h4><a href="login.php">Volver</a></h4>
    </form>

</div>
