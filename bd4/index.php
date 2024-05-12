<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
</head>
<body>
    <h1>Citas</h1>
    <?php
        require_once("model/modeloConexion.php");

        $verCitas = new ModeloConexion();
        $array = $verCitas->verCitasPorVista(2);

        // print_r($array);
        foreach($array as $clave){
            // if($clave['cita_visible'] == 2 ){
                echo $clave['cita_texto'] . "<br><b>Autor: " . $clave['cita_autor'] . "</b><br>";
            // }
        }

    ?>
</body>
</html>