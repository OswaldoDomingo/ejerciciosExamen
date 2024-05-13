<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver citas</title>
</head>

<body>
    <?php
    session_start();
    require_once("../model/modeloCitas.php");

    if($_SESSION['usuario']==0){
        echo "<h1>Hola invitado</h1>
        <h3>Te muestro citas públicas de los usuarios.</h3>";
    }

    $verCitas = new ModeloCitas();

    if (isset($_SESSION['usuario'])) {
        $arrayFiltrado = $verCitas->verCitasPorUsuario($_SESSION['usuario']);
        foreach ($arrayFiltrado as $clave) {
            echo $clave['cita_texto'] . "<br><b>Autor: " . $clave['cita_autor'] . "</b><br>";
        }
    } else {
        $arrayTodas = $verCitas->verTodasLasCitas();
        foreach ($arrayTodas as $clave) {
            echo $clave['cita_texto'] . "<br><b>Autor: " . $clave['cita_autor'] . "</b><br>";
        }
    }


    

    ?>
    <a href="../index.php">Ir a inicio</a>
</body>

</html>