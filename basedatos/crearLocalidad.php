<?php
include 'conexion.php';

$sqlTablaLocalidad = "CREATE TABLE localidades (
    id_localidad INT AUTO_INCREMENT PRIMARY KEY,
    localidad VARCHAR(255) NOT NULL
)";

try {
    // Ejecutar la consulta para crear la tabla localidades
    $conexion->exec($sqlTablaLocalidad);
    echo "Tabla localidades creada exitosamente.";
} catch(PDOException $e) {
    echo "Error al crear la tabla localidades: " . $e->getMessage();
}

$sqlModificarTablaEmpleados = "ALTER TABLE empleados 
    ADD COLUMN id_localidad INT,
    ADD FOREIGN KEY (id_localidad) REFERENCES localidades(id_localidad)";

try {
    // Ejecutar la consulta para modificar la tabla empleados
    $conexion->exec($sqlModificarTablaEmpleados);
    echo "Tabla empleados modificada exitosamente.";
} catch(PDOException $e) {
    echo "Error al modificar la tabla empleados: " . $e->getMessage();
}

// Consulta de inserción para añadir registros a la tabla localidades
$sqlInsercionLocalidades = "INSERT INTO localidades (localidad) VALUES
    ('Valencia'),
    ('Alicante'),
    ('Castellón')";

try {
    // Ejecutar la consulta de inserción
    $conexion->exec($sqlInsercionLocalidades);
    echo "Registros insertados en la tabla localidades exitosamente.";
} catch(PDOException $e) {
    echo "Error al insertar registros en la tabla localidades: " . $e->getMessage();
}
?>
