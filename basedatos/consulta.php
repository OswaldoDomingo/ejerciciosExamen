<?php
include 'conexion.php';
$salario = "salario";
$dinero = 25000;
$mayor = ">";
$menor = "<";
$igual = "=";

try {
    // Preparar y ejecutar la consulta
    // $sqlConsulta = "SELECT * FROM empleados, localidades WHERE $salario $mayor $dinero";
    // Consulta SQL con condiciones para seleccionar empleados y localidades
    $sqlConsulta = "SELECT * FROM empleados 
    JOIN localidades ON empleados.id_localidad = localidades.id_localidad 
    WHERE $salario $mayor $dinero";
    $consulta = $conexion->query($sqlConsulta);

    // Obtener todos los resultados en un array
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En caso de error en la consulta
    echo "Error en la consulta: " . $e->getMessage();
}
