<?php
session_start();
require_once('../libs/bGeneral.php');
$errores = [];

if(isset($_REQUEST['enviar'])){
    $nombre = recoge('usuario');
    $pass = recoge('clave');

    if(empty($errores)){
        //Comprobar si la contraseña y el usuario coinciden en la base de datos
        //Si el usuario existe, comprobar la contraseña
        
    }

}


