<?php
$servidor = "localhost";
$usuario = "root";
$pass = "kali";
$bdatos = "ejercicio1";
$conexion = mysqli_connect($servidor, $usuario, $pass);

if (!$conexion) {
    echo "Error";
} else {
    // Conexión a lña base de datos
    mysqli_select_db($conexion, $bdatos);
    // Establecer el conjunto de caracteres de la conexión a UTF-8
    mysqli_set_charset($conexion, "utf8");
}
