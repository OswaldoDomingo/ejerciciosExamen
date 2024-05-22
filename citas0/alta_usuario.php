<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta usuarios</title>
    <link rel="stylesheet" href="./public/estilos.css">
</head>

<body>
    <h1>Alta nuevo usuario</h1>
    <?php
    require_once("vistas/formulario_nuevo_usuario.php");
    // Verificar si la clave 'errores' está definida en $_SESSION
    $errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : array();

    // Recorrer el array $errores y mostrar los mensajes de error
    foreach ($errores as $clase => $error) {
        echo $clase . " => " . $error;
        echo "<br>";
    }

    // Eliminar la clave 'errores' de $_SESSION
    unset($_SESSION['errores']);
    ?>
</body>

</html>