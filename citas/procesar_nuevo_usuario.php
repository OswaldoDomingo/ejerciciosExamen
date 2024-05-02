<?php
session_start();
require_once("./database/conexion.php");
require_once("./libs/bGeneral.php");
require_once("./libs/funciones.php");
$conexion = conexion();

$errores = [];

if (!isset($_REQUEST["nuevo_usuario"])) {
    header("Location:index.php");
    exit;
} else {
    $nombre = recoge('nombre');
    $password = recoge('password');
    $correo = recoge('correo');

    cTexto($nombre, 'correo', $errores);
    valida_correo($correo, 'correo', $errores);
    validar_password($password, $errores);

    if (empty($errores)) {
        //Comprobar si el correo existe y si exste de error y avise que ese correo se está usando para una cuenta.
        comprobar_correo($conexion, $correo, $errores); //Si ya está el correo retorna false y añade en el array $errores un elemento

        //Si todo está correcto proceder al alta, toda alta tiene nivel 2 y se ha de poner de manera automática.
        if (empty($errores)) {
            alta_usuario($conexion, $nombre, $correo, $password, $errores);
            echo "Todo bien por ahora";
        } else {
            $_SESSION['error_alta_usuario1'] = $errores['alta_correo'];
            $_SESSION['errores'] = $errores;
            header("Location:alta_usuario.php");
        }
        //Si se ha podido hacer el alta enviarlo o bien a login o a la página de usuario.

    } else {
        $errores['error_alta_usuario2'] = "Error al crear el nuevo usuario";
        $_SESSION['errores'] = $errores;
        header("Location:alta_usuario.php");
    }
}
