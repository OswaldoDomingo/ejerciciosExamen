<?php
    require_once("./libs/bGeneral.php");
    require_once("./libs/funciones.php");
    require_once("./libs/conexion.php");

    $errores = [];

    if(!isset($_REQUEST["enviar"])){
        include("formulario.php");
    } else {

        //Recoger datos del formulario
        $nombre = recoge("nombre");
        $apellido = recoge("apellido");
        $dni = recoge("dni");
        
        cUser($nombre, 'nombre', $errores);
        cUser($apellido, 'apellido', $errores);
        cUser($dni, 'dni', $errores,9,9);
        
        if(empty($errores)){
            $sqlInsertar = "INSERT INTO usuarios (nombre, apellido, dni) VALUES ('$nombre', '$apellido', '$dni')";
            if(mysqli_query($conexion, $sqlInsertar)){
                echo "Registros insertados con éxito";
            } else {
                echo "Error al insertar registros: " . mysqli_error($conexion);
            }
            mysqli_close($conexion);
            header("Location=destino.php?nombre=$nombre&apellido=$apellido&dni=$dni");
        } else {
        include("formulario.php");
        }
    }


?>