<?php
    include_once("./libs/bGeneral.php");
    include_once("./libs/bSeguridad.php");
    session_start();
    $errores=[];
    if(!isset($_SESSION['acceso'])){
        $_SESSION['acceso']=0;
    }
try{
    if (isset($_REQUEST['enviar'])){
    $user=recoge('user');
    $pass=recoge('pass');
    require ('libs/config.php');

    require ('modelo/classEmpleado.php');
    $empleado=new empleado();
    $datosUser=$empleado->verificaEmpleado($user);
    if(count($datosUser)===1){
        print_r($datosUser);
        if (comprobarhash($pass,$datosUser[0]['pass'])){
        $_SESSION['acceso']=1;
        $_SESSION['usuario']=$user;
        $_SESSION['nombre']=$datosUser[0]['nombre'];
        header("location:privada.php");
    }}else{
        $errores['login']="Login no correcto";
        include ('fLogin.php');
    }
}else
include ('fLogin.php');
}
catch(PDOException $e){


    error_log($e->getMessage() . "##Código: " . $e->getCode()."  ". /*$fechaformatoddmmaaaa*/microtime()  . PHP_EOL, 3, "logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";

}
?>