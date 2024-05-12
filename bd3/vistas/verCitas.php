<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las citas</title>
</head>
<body>
<?php
    // Verificar si $arrayCitas está definida antes de usarla
    //vistas\verCitas.php
    if (isset($arrayCitas) && is_array($arrayCitas)) {
        foreach($arrayCitas as $clave => $valor) {
            echo $clave . " " . $valor;
            echo "<br>";
        }
    } else {
        echo "No hay citas disponibles.";
    }
    ?>
</body>
</html>