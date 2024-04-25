<?php
$servidor = "localhost";
$usuario = "root";
$pass = "kali";
$bdatos = "ejercicio1";
$conexion = mysqli_connect($servidor, $usuario, $pass);

if(!$conexion){
    echo "Error";
} else {
    $sql = "CREATE DATABASE IF NOT EXISTS $bdatos";
    if(mysqli_query($conexion, $sql)){
        echo "Base de datos $bdatos creada con éxito";
    } else {
        echo "error: " . mysqli_errno($conexion);
    }
    mysqli_select_db ($conexion, $bdatos);
    $sqlTablas = "CREATE TABLE IF NOT EXISTS usuarios(nombre VARCHAR(20), apellido VARCHAR(20), dni VARCHAR(9))";
    mysqli_query($conexion, $sqlTablas);
    
    $sqlInsertar = "INSERT INTO usuarios (nombre, apellido, dni) VALUES ('Juan', 'Perez', '123456789'), ('Maria', 'Gomez', '987654321'), ('Pedro', 'Rodriguez', '456789123')";
    if(mysqli_query($conexion, $sqlInsertar)){
        echo "Registros insertados con éxito";
    } else {
        echo "Error al insertar registros: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}

