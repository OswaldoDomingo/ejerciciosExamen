<?php
function conexion(){
    $servidor="localhost";
    $base_datos = "pruebas";
    $usuario = "pruebas";
    $password = "pruebas";

    $dns = "mysql:host=$servidor;dbname=$base_datos;charset=utf8";

    try{
        $conexion = new PDO($dns, $usuario, $password);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conexion->exec("SET CHARACTER SET utf8");

        return $conexion;

    }catch(PDOException $e){
        echo "Error en la conexión: " . $e->getMessage();
    }
}
?>