<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<h1>Ejercicio  3</h1>
    <p>Contador. Vamos a crear un contador de visitas.  Inserta en una página cualquiera, para ello es necesario crear un archivo de texto en blanco llamado counter.txt en la misma ubicación donde se ejecuta el script. Cada vez que se cargue la página se mostrará el número de visitas hasta el momento. Guárdalo como contador.php. </p>
    <?php
        include 'funciones.php';
        $cuenta = contarVisitas('counter.txt');
        echo $cuenta;
    ?>
</body>
</html>