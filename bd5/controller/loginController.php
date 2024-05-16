<?php
$errores = [];

if(isset($_POST['enviar'])){
    require_once '../model/ModeloConexion.php';
    require_once '../libs/bGeneral.php';

    $email = recoge('email');
    $password = recoge('password');                                                                                     
    if(empty($errores)){
        $conexion = new ModeloConexion();
        

    }




}