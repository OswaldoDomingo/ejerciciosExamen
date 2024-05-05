<?php
session_start();
require_once("modelo/conexion.php");

$mapa=[
    'inicio'=>'inicio.php',
    'login'=>'formulario_login.php',
    'nueva_cita'=>'formulario_nueva_cita.php',
    'ver_citas'=>'ver_citas.php',
    'error'=>'404.php',
];
if(isset($_GET['ctl']) && isset($mapa[$_GET['ctl']])){  
    $ruta = $_GET['ctl'];
} else {
    $ruta = "inicio";
}




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas MVC</title>
    <link rel="stylesheet" href="vistas/css/estilos.css">
</head>
<body>

    <?php
    // require_once __DIR__ . "/vistas/" . $mapa[$ruta];
    require_once __DIR__ . DIRECTORY_SEPARATOR . "vistas" . DIRECTORY_SEPARATOR . $mapa[$ruta];

    ?>

</body>
</html>