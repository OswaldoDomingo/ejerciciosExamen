<?php
session_start();
require_once('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Empleado</title>
</head>

<body>
    <h1>Ficha Empleado</h1>
    <?php
    if (isset($_SESSION['formulario_procesado']) && $_SESSION['formulario_procesado'] === true) {
        $nuevo_usuario = isset($_SESSION['nuevo_usuario']) ? $_SESSION['nuevo_usuario'] : array();
        // foreach($nuevo_usuario as $clave=>$valor){
        //     echo "$clave: $valor <br>";
        // }
        try {
            $sqlNuevoUsuario = $conexion->prepare("SELECT nombre, puesto, fecha_nacimiento as 'fecha nacimiento', salario, localidad FROM empleados JOIN localidades ON empleados.id_localidad = localidades.id_localidad  ORDER BY id DESC LIMIT 1");
            //Ejecuto la consulta
            $sqlNuevoUsuario->execute();
            //Obtener la última entrada
            $ultimaEntrada = $sqlNuevoUsuario->fetch(PDO::FETCH_ASSOC);
            //$ultima_entrada contiene el array de la última entrada de la base de datos
            foreach ($ultimaEntrada as $clave => $valor) {
                echo ucfirst($clave) . " : $valor <br>";
            }
            unset($_SESSION['formulario_procesado']);
        } catch (PDOException $e) {
            // En caso de error, mostrar el mensaje de error
            echo "Error al leer la última entrada de la tabla usuario: " . $e->getMessage();
        }
    } else {
        // Si no se ha procesado el formulario correctamente, redirigir a otra página o mostrar un mensaje de error
        echo "No se ha procesado el formulario correctamente. Por favor, regrese al formulario.
    ";
    }
    ?>
    <a href="formularioEmpleado.php">Crear nuevo empleado</a>
</body>

</html>