<?php
session_start();
require_once('../libs/bGeneral.php');
require_once('../model/modeloLogin.php');

$errores = [];

if(isset($_REQUEST['enviar'])){
    $nombre = recoge('usuario');
    $pass = recoge('clave');

    if(empty($errores)){
        echo "Pasito al paraíso";
        //Comprobar si la contraseña y el usuario coinciden en la base de datos
        //Si el usuario existe, comprobar la contraseña
        $entradaUsuario = new ModeloLogin();

        $validacion = $entradaUsuario->comprobarLogin($nombre, $pass, $errores);
        if(isset($errores['pass'])){
            echo $errores['pass'];
            echo "<br>";
        }
        
        if(isset($errores['usuario'])){
            echo $errores['usuario'];
            echo "<br>";
        }
        
        if($validacion){
            echo "Usuario conectado";
            echo "<br>";
            $datosUsuario = $entradaUsuario->datosUsuario();
            echo "<br>";
            echo "Nombre: " . $_SESSION['usuario'];
            echo "<br>";
            echo "Correo: " . $_SESSION['correo'];
            echo "<br>";
            echo "Nivel: " . $_SESSION['nivel'];
            echo "<br>";
            echo "<img src='../img/" . $_SESSION['imagen'] . "' alt='imagen usuario'>";
            echo "<br>";
            echo "<a href='../index.php'>Ir a inicio</a>";
        } else {
            echo "Hay problemas en el paraiso";
        }

        
        
    }

}


