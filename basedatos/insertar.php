<?php
include 'conexion.php';

try {
    // Preparar la consulta para insertar un usuario
    $consulta = $conexion->prepare("INSERT INTO empleados (nombre, puesto, fecha_nacimiento, salario) VALUES (:nombre, :puesto, :fecha_nacimiento, :salario)");

    // Array de usuarios
    $usuarios = array(
        // array("Oswaldo", "Programador backend", "1963-08-27", 20000),
        array("Juan", "Diseñador UX/UI", "1990-05-15", 25000),
        array("María", "Analista de datos", "1985-12-10", 22000),
        array("Carlos", "Ingeniero de software", "1988-07-20", 28000),
        array("Laura", "Desarrollador frontend", "1992-03-08", 23000),
        array("Pedro", "Gerente de proyectos", "1976-09-14", 30000),
        array("Ana", "Especialista en marketing", "1983-06-25", 26000),
        array("Miguel", "Ingeniero de sistemas", "1995-02-18", 27000),
        array("Sofía", "Diseñadora gráfica", "1998-11-30", 24000),
        array("Diego", "Desarrollador full-stack", "1991-04-05", 29000),
        array("Elena", "Analista de calidad", "1979-10-12", 31000),
        array("Andrea", "Especialista en SEO", "1986-01-28", 25000),
        array("Javier", "Arquitecto de software", "1982-07-02", 32000),
        array("Lucía", "Administrador de sistemas", "1993-08-15", 27000),
        array("Fernando", "Consultor de negocios", "1989-05-07", 26000),
        array("Rocío", "Programadora móvil", "1997-12-22", 28000),
        array("Santiago", "Analista financiero", "1975-03-17", 30000),
        array("Isabel", "Diseñadora de experiencia de usuario", "1980-09-03", 27000),
        array("Carmen", "Ingeniera de software", "1994-06-11", 29000),
        array("Pablo", "Desarrollador web", "1987-04-19", 26000)
    );

    // Iterar sobre cada usuario y ejecutar la consulta
    foreach ($usuarios as $usuario) {
        // Vincular los parámetros de la consulta con los valores del usuario actual
        $consulta->bindParam(':nombre', $usuario[0]);
        $consulta->bindParam(':puesto', $usuario[1]);
        $consulta->bindParam(':fecha_nacimiento', $usuario[2]);
        $consulta->bindParam(':salario', $usuario[3]);

        // Ejecutar la consulta para insertar el usuario actual
        $consulta->execute();
    }

    echo "Usuarios insertados correctamente"; // Esto se mostrará si la inserción es exitosa

} catch(PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    echo "Error de inserción: " . $e->getMessage();
}
?>
