<?php
try{
include("libs\classConfig.php");
include("modelo\classEmpleado.php");
include("libs\bGeneral.php");
include("libs\bComponentes.php");
include_once("./libs/bSeguridad.php");

session_start();
$empleado=new empleado();
$arrayLocalidades=$empleado->selectLocalidadesForm();
$errores=[];
if(!isset($_SESSION['acceso'])){
    $_SESSION['acceso']=0;
}
$mensajes=[];

if(isset($_REQUEST["aceptar"])){
    

    $nombre=recoge("nombre");
    $puesto=recoge("puesto");
    $fechaN=recoge("fechaN");
    $salario=recoge("salario");
    $localidad=recoge("localidades");
    $user=recoge("user");
    $pass=recoge("pass");

    cTexto($nombre,"nombre",$errores);
    cTexto($puesto,"puesto",$errores);
    unixFechaAAAAMMDD($fechaN,"fechaN",$errores);
    cNum($salario,"salario",$errores,true,10000);
    cUser($user, "usuario",$errores, 15);
 
    cSelect($localidad,"localidades",$errores,$arrayLocalidades);

    if(empty($errores)){
        //Encriptamos la contraseña
        $pass=encriptar($pass);
        if ($empleado->setEmpleado ($nombre, $puesto, $fechaN, $salario, $localidad,$user,$pass)){
            
            header("location:login.php");
        }else{
            $errores ["datos"]="Ha habido uun error";
        include("forminsert.php");
        }
    }

} 
}catch (PDOException $e) {

    error_log($e->getMessage() . "## Fichero: " . $e->getFile() . "## Línea: " . $e->getLine() . "##Código: " . $e->getCode() . "##Instante: " . microtime() . PHP_EOL, 3, "logBD.txt");

    $errores['datos'] = "Ha habido un error <br>";

    if ($e->getCode() == 23000){

        $errores['datos'] = "Ya existe ese usuario en la BD";
    }else{
        $errores['datos'] = "Ha sucedido un error en la inserción";
    }    
}
include("forminsert.php");
?>


