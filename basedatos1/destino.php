<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro válido</title>
</head>
<body>
    <h1>Destino</h1>
    <p>Enhora buena</p>
    <?php
    require_once("./libs/bGeneral.php");
    $nombre = recoge("nombre");
    $apellido = recoge("apellido");
    $dni = recoge("dni");
    ?>
    <p>Ya estas registrado en la base de datos, y recuerda 
        <?= $nombre . " " . $apellido ?>
    </p>
        
    <p>Que tu clave es <?= $dni ?> el mismo que tu dni.</p>
</body>
</html>