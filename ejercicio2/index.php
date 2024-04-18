<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <p>Ejercicio 2 <br>
    Realizar una función denominada obtenerSuma que reciba como parámetro un archivo con un número por línea, los lea, y devuelva la suma.</p>
    <?php
        include 'funciones.php';
        $sumaTotal = obtenerSuma('archivo.txt');
        echo $sumaTotal;
    ?>
</body>
</html>