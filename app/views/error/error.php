<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<style>
    .center {
        text-align: center;
    }
</style>

<body>

<br><br><br><br><br><br>

<div class="center">

    <h3><?php
        if ($param) {
            echo "<br><br>" . $param[0];

            switch ($param[1]){
                case "NotFound":
                    echo $this->cargarView("../views/error/footerNotFound.php");
                    break;
                case "Session":
                    echo $this->cargarView("../views/error/footerSession.php");
                    break;
            }
        }
        ?></h3>
</div>