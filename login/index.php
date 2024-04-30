<?php
session_start();
//index.php
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <?php
        $_SESSION['permisos_id'] = 1;
        echo isset($_SESSION['permisos_id'])?"Usuario nivel " . $_SESSION['permisos_id']:"";

        $error = isset($_SESSION['error_login']) ? $_SESSION['error_login'] : "";
        include("formularioLogin.php");
        echo $error;
        unset($_SESSION['error_login']);
    ?>
</body>
</html>