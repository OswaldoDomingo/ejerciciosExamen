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
    validar_correo($email, $errores);
    $nombreUsuario = recoge('username');
    cTexto($nombreUsuario, 'username', $errores);
    //Valido contraseña solo mirando que tenga más de 8 caracteres
    $pass = $_REQUEST['password'];
    validar_password($pass, $errores);
    $fecha_nacimiento = recoge('fecha_nacimiento');
    validar_fecha($fecha_nacimiento, $errores);
    $telefono = recoge('telefono');
    validar_telefono($telefono, $errores);
    $genero = recoge('genero');
    cRadio($genero, 'genero', $errores, $valoresGenero);

    //$deportesSeleccionados = $_POST['deportes'] ?? []; // Usando operador de fusión de null para manejar el caso de que el array no esté definido
    $deportesSeleccionados = recogeArray('deportes');
    cCheck($deportesSeleccionados, 'deportes' , $errores, $valoresDeportes);

    
    cFile('foto', $errores, $extensionesValidas, $directorio, $max_file_size, false);
    
    
    if(count($errores) === 0){
        echo "Pasado";
    } else {
        include 'altaClubDeportivo.php';

    }

}
