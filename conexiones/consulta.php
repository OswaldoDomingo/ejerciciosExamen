<?php
require_once('conexion.php');
$conexion = conexion();

$query = "SELECT * FROM usuarios";

$consulta = $conexion->query($query);

$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
//$resultados2 = $consulta->fetchAll(PDO::FETCH_KEY_PAIR);

if(count($resultados) > 0){
    //Mostrar resultados con $consulta->fetchAll(PDO::FETCH_KEY_PAIR);
    // foreach($resultados as $clave=>$valor){
    //     echo "Posición $clave es $valor<br>";
    // }
    print_r($resultados);
    echo "\n";
    //Mostrar resultados con $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultados as $fila) {
            echo "ID: " . $fila['id'] . ", 
            Nombre: " . $fila['nombre'] . "\n";
        } 
}else {
    echo "Tabla vacía";
}