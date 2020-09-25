<br><br><br>

<div align="center">

    <h2>Iniciar Sesion</h2>

    <form action="login.php" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" value="Iniciar Sesion">

        <?php
        if ($error != "") {
            echo "<p>$error</p>";
        }
        ?>

        <h4><a href="register.php">¿No tienes cuenta?</a></h4>
        <h4><a href="list-items.php">Volver</a></h4>
    </form>

</div>
