<?php
session_start();

require_once("./database/conexion.php");
require_once("./database/consultas.php");
require_once("./libs/bGeneral.php");

if(isset($_POST['enviar'])){
    $usuario = recoge('usuario');
    $password = recoge('password');


    $conexion = conexion();
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password");
    $consulta->execute(array(":usuario"=>$usuario, ":password"=>$password));

    if($consulta->rowCount() == 1{
       $_SESSION['verificado'] = true;
         header("Location: index.php");
    } else {
        echo "Usuario no autenticado";
    }
}
