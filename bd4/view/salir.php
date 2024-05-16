<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salida</title>
</head>
<body>
    <h1>Has salido</h1>
    <?php
    session_start();
    include_once("../model/modeloLogin.php");
    $salir = new ModeloLogin();
    $salir->cerrarSesion();
    $_SESSION['usuario']=0;
    echo "<a href='../index.php'>Volver a inicio</a>";
    ?>
</body>
</html>