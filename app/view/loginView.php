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

        <br><br><br>
        <input type="button" onclick="location.href='register.php'" value="¿No tienes cuenta?">
        <input type="button" onclick="location.href='reminder.php'" value="¿Contraseña Olvidada?">

    </form>

</div>
