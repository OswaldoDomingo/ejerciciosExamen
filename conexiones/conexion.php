<?php


function conexion()
{
    $usuario = "pruebas";
    $base_datos = "pruebas";
    $password = "pruebas";
    $servidor = "localhost";

    $dns = "mysql:host=$servidor;dbname=$base_datos;charset=utf8";

    $conexion = new PDO($dns, $usuario, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conexion->exec("SET CHARACTER SET utf8");

    return $conexion;

    try{

    } catch(PDOException $e){
        echo "Error enm la conexión: " . $e->getMessage();
        return null; // Retorna null en caso de error
    }
}
