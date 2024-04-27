<?php
session_start();
require_once('./libs/bComponentes.php');
require_once('conexion.php');
require_once('funcionesBD.php');
$errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : array();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta empleado</title>
</head>

<body>
    <h1>Alta empleado</h1>
    <?php
    //Si hay errores, estos se muestran
    if (isset($_SESSION['errores'])) {
        foreach ($_SESSION['errores'] as $error) {
            echo "$error <br>";
        }
        // Limpiar los errores después de mostrarlos
        unset($_SESSION['errores']);
    }
    ?>
    <form action="procesaFormulario.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <br>
        <label for="puesto">Puesto/cargo: </label>
        <input type="text" name="puesto" id="puesto">
        <br>
        <br>
        <label for="nacimiento">Fecha Nacimiento: </label>
        <input type="date" name="nacimiento" id="nacimiento">
        <br>
        <br>
        <label for="salario">Salario: </label>
        <input type="text" name="salario" id="salario">
        <br>
        <br>
        <label for="localidades">Localidad: </label>
        <?php

        // $valores = array();
        // foreach ($resultado as $fila) {
        //     $valores[$fila['id_localidad']] = $fila['localidad'];
        // }
        // pintaSelect($valores, 'localidades');
        pintaSelect(consultaSelect($conexion), 'localidades');
        ?>
        <br>
        <br>
        <input type="submit" value="Alta" name="enviar">

    </form>
</body>

</html>