<?php
session_start();
require_once("./libs/bGeneral.php");
require_once("./libs/funciones.php");
$errores=[];

if(!isset($_REQUEST["nuevo_usuario"])){
    header("Location:index.php");
    exit;
} else{
    $nombre = recoge('nombre');
    $password = recoge('password');
    $correo = recoge('correo');

    cTexto($nombre, 'correo', $errores);
    valida_correo($correo, 'correo', $errores);

    if(empty($errores)){
        echo "Todo bien por ahora";
    } else{
        echo "Algo va mal<br>";
        foreach($errores as $clave=>$valor){
            echo "El $clave está mal por $valor"; echo "<br>";
        }
    }

}