<br><br><br>

<div align="center">

    <h2>Registrar Usuario</h2>

    <form action="index.php?action=register" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="password" name="password2" placeholder="Repetir Contraseña">
        <input type="submit" value="Registrar">

        <?php

        if ($error != "") {
            echo "<p>$error</p>";
        }
        ?>

        <br><br><br>
        <input type="button" onclick="location.href='index.php?action=logIn'" value="Volver">
    </form>

</div>
