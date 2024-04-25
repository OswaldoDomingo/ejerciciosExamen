<?php
require_once('funciones.php');
require_once('libs/bGeneral.php');
require_once('config.php');

if(!isset($_REQUEST['submit'])){
    require('index.php');
} else {
    $nombre = recoge('nombre');
    // cTexto($nombre, 'nombre', $errores);
    cUser($nombre, 'nombre', $errores);//Máximo 30 y mínimo 1, es obligatorio por el mínimo 1
    $apellido1 = recoge('apellido1');
    // cTexto($apellido1, 'apellido1', $errores);
    cUser($apellido1, 'apellido1', $errores);
    $apellido2 = recoge('apellido2');
    // cTexto($apellido2, 'apellido2', $errores);
    cUser($apellido2, 'apellid02', $errores, 30, 0); //No es obligatorio por el mínimo 0
    $email = recoge('email');
    validar_correo($email, $errores);
    $nombreUsuario = recoge('username');
    // cTexto($nombreUsuario, 'username', $errores);
    cUser($nombreUsuario, 'username', $errores);//Máximo 30 y mínimo 1, es obligatorio por el mínimo 1
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

    
    
    if(empty($errores)){
        
        $imagen = cFile('foto', $errores, $extensionesValidas, $directorio, $max_file_size, false);
        //Si no se generó ningún error en el archivo
        
        if(empty($errores)){
            $nombreCompleto = $nombre . " " . $apellido1 . " " . $apellido2;
            // $serialized_deportes = urlencode(implode(",", $deportesSeleccionados));
            $serialized_deportes = serialize($deportesSeleccionados);

            header("Location:correcto.php?nombre=$nombreCompleto&email=$email&usuario=$nombreUsuario&fechaNacimiento=$fecha_nacimiento&genero=$genero&telefono=$telefono&imagen=$imagen& deportes=$serialized_deportes");
            exit;

        } else {
        include 'index.php';
        }
    } else {
        include 'index.php';

    }

}
