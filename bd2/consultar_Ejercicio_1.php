<?php



try{
    include('libs\config.php');
    include('modelo\classEmpleado.php');
    $empleado=new empleado();
    $arrayresultado=$empleado->getEmpleados();
    if (count($arrayresultado)===0)
    echo "No hay empleados que mostrar";
    else {
        foreach ($arrayresultado as $row) { 
            echo "ID:". $row['id'] . "<br> ";
            echo "Nombre: ".$row['nombre'] . "<br>";
            echo "Puesto: ".$row['puesto'] . "<br>";
            echo "Fecha Nacimiento: ".$row['fecha_nacimiento'] . "<br>";
            echo "Salario: ".$row['salario'] . "<br>";
            echo "Localidad: ".$row['localidad'] . "<br>";
            echo "<hr><br>";
        }
    }

    $empleado=null;

}catch(PDOException $e){


    error_log($e->getMessage() . "##Código: " . $e->getCode()."  ". /*$fechaformatoddmmaaaa*/microtime()  . PHP_EOL, 3, "logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";

}
if (isset($errores)){
    echo $errores['datos'];
}
?>