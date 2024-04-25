<?php
$servidor = "localhost";
$usuario = "root";
$pass = "kali";
$bdatos = "ejercicio1";
$conexion = mysqli_connect($servidor, $usuario, $pass);
mysqli_select_db ($conexion, $bdatos);
if(!$conexion){
    echo "Error";
}


?>