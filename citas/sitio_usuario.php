<?php 
session_start(); 
$datos_usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio de <?php echo $datos_usuario['nombre']; ?></title>
</head>
<body>
    <?php
        foreach($datos_usuario as $clave=>$valor){
            echo $clave . " => " . $valor;
            echo "<br>";
        }
    ?>
</body>
</html>