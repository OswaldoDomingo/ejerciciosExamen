<?php
session_start();
require_once('./libs/bGeneral.php');
require_once('./libs/bComponentes.php');
require_once('./libs/funciones.php');
require_once('conexion.php');
require_once('funcionesBD.php');
$errores = [];


//Recoger los valores del formulario y validarlos 
if(!isset($_REQUEST['enviar'])){
    header("Location:formularioEmpleado.php");
} else {
    //Nombre del usuario
    $nombre = recoge('nombre');
    cTexto($nombre, 'nombre', $errores);
    //Nombre del puesto que ocupa
    $puesto = recoge('puesto');
    cTexto($puesto, 'puesto', $errores);
    //Fecha
    $fecha = recoge('nacimiento');
    validar_fecha($fecha,$errores);
    //Salario
    $salario = recoge('salario');
    cNum($salario, 'salario', $errores);
    //Localidad
    $localidad = recoge('localidades');
    cSelect($localidad, 'localidades', $errores, consultaSelect($conexion));

    if(empty($errores)){
       
        //Conectar a la base de datos
        //Crear el sql para insertar en la base de datos
        $sqlInsertar=$conexion->prepare("INSERT INTO empleados (nombre, puesto, fecha_nacimiento, salario, id_localidad) VALUES (:nombre, :puesto, :fecha_nacimiento, :salario, :localidad)");

        //Enviar a la base de datos
        $sqlInsertar->bindParam(':nombre', $nombre);
        $sqlInsertar->bindParam(':puesto', $puesto);
        $sqlInsertar->bindParam(':fecha_nacimiento', $fecha);
        $sqlInsertar->bindParam(':salario', $salario);
        $sqlInsertar->bindParam(':localidad', $localidad);
        if($sqlInsertar->execute()){
            //Si no hay error pasar a fichaEmpleado.php
            //Paso los valores del usuariuo por una variable de session 
            $nuevo_usuario = ['nombre'=>$nombre, 'puesto'=>$puesto, 'fecha'=>$fecha, 'salario'=>$salario, 'localidad'=>$localidad];
            $_SESSION['nuevo_usuario'] = $nuevo_usuario;
            $_SESSION['formulario_procesado'] = true;
            header("Location:fichaEmpleado.php");
        } else {
            $errores['insertar'] = "Se ha producido un error al insertar los datos";
            $_SESSION['errores'] .= $errores['insertar'];
            header("Location:formularioEmpleado.php");
        }

        //Si hay algún error voluer a formulario
    } else {
        //Volver a formulario con los errores
        $_SESSION['errores']=$errores;
        header("Location:formularioEmpleado.php");

    }
}

?>