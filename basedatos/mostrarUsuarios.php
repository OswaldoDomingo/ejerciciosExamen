<?php
// include 'conexion.php';
include 'consulta.php';

// Verificar si se obtuvieron resultados
if (count($resultados) > 0) {
    // Mostrar los resultados en una tabla HTML utilizando un bucle foreach
    echo "<h1>Usuarios</h1>
        <table border='1'>
        <tr>
            <!-- <th>ID</th> -->
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Fecha de Nacimiento</th>
            <th>Salario</th>
            <th>Localidad</th>
        </tr>";
    
    foreach ($resultados as $fila) {
        echo "<tr>";
        // echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['puesto'] . "</td>";
        echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
        echo "<td>" . $fila['salario'] . "</td>";
        echo "<td>" . $fila['localidad'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    // Si no se encontraron resultados
    echo "No se encontraron registros";
}



?>