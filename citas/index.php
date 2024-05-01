<?php
session_start();
//index.html
$error=[];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="public/estilos.css">
</head>
<body>
    <h1>Citas</h1>
    <h2>Entra a tus citas</h2>
    <?php
        echo isset($_SESSION["error_login"]) ? $_SESSION["error_login"] : "";
        echo "<br><br>";
        require("vistas/formulario_login.php");
        unset($_SESSION["error_login"]);
    ?>
    <h3 class="centrar-texto">Si no estas registrado</h3>
    <p class="centrar-texto"> <a href="./vistas/formulario_nuevo_usuario.php">Entra</a> a crear una cuenta.</p>
    <p class="centrar-texto">Aquí podría aparecer una cita de las públicas.</p>
    <div class="caja-cita">
        <p class="centrar-texto">Uno de los aspectos más desgraciados de nuestra era es que ya no tenemos buhardillas ni sótanos donde guardar el pasado.</p>
        <p class="enfasis">Ray Bradbury</p>
    </div>
</body>
</html>