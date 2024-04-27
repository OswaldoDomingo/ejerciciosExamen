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
        //Insertar datos
        header("Location:fichaEmpleado.php");
    } else {
        //Volver a formulario con los errores
        $_SESSION['errores']=$errores;
        header("Location:formularioEmpleado.php");

    }
}

?>