<?php
require_once('funciones.php');
require_once('libs/bGeneral.php');
require_once('config.php');

if(!isset($_REQUEST['submit'])){
    require('altaClubDeportivo.php');
} else {
    $nombre = recoge('nombre');
    cTexto($nombre, 'nombre', $errores);
    $apellido1 = recoge('apellido1');
    cTexto($apellido1, 'apellido1', $errores);
    $apellido2 = recoge('apellido2');
    cTexto($apellido2, 'apellido2', $errores);
    $email = recoge('email');
    valida_correo($email, $errores);
    $fecha_nacimiento = recoge('fecha_nacimiento');
    valida_fecha($fecha_nacimiento, $errores);

    cFile('foto', $errores, $extensionesValidas, $directorio, $max_file_size, false);


    if(count($errores) === 0){
        echo "Pasado";
    } else {
        include 'altaClubDeportivo.php';

    }

}
