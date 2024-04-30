<?php
ob_start();
session_start();
//autenticar.php
// ob_start() 
//Es una función de PHP que te permite "capturar" toda la salida que se enviaría al navegador y almacenarla temporalmente en un búfer de salida en lugar de enviarla directamente. Entonces, puedes hacer cosas como enviar encabezados HTTP después de haber enviado alguna salida.
// Por ejemplo, si necesitas redirigir a los usuarios a otra página después de haber mostrado algo en tu página actual, pero ya has enviado algo al navegador, ob_start() te ayuda a evitar el error "Cannot modify header information - headers already sent".
// En resumen, ob_start() te permite posponer el envío de salida al navegador, lo que te da más flexibilidad para realizar acciones adicionales, como enviar encabezados HTTP, más adelante en tu script.
require_once("./database/conexion.php");
require_once("./database/consultas.php");
require_once("./libs/bGeneral.php");
require_once("./database/seguridad.php");
$errores = [];

if (isset($_POST['enviar'])) {
    $usuario = recoge('usuario');
    $password = recoge('password');
    //pasar las variables por cTexto() y si no hay errores seguir
    cTexto($usuario, 'usuario', $errores);
    cTexto($password, 'password', $errores);
    
    if(empty($errores)){

    // Encriptar la contraseña ingresada por el usuario
    $password_encriptada = encriptar($password);

    $conexion = conexion();
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $consulta->execute(array(":usuario" => $usuario));

    // Obtener el resultado de la consulta
    $usuario_bd = $consulta->fetch();

    if($usuario_bd && comprobarHash($password, $usuario_bd['password'])){
        // Usuario autenticado correctamente
        $_SESSION['verificado'] = true;

        // Almacenar permisos_id en una variable de sesión
        $_SESSION['permisos_id'] = $usuario_bd['permisos_id'];
        
        //Redirigir a página personal
        header("Location:pagina_personal.php");
        exit; // Importante salir del script después de redirigir
     } else {
         // Si el usuario no existe o la contraseña es incorrecta, mostrar un mensaje de error
         $errores['login'] = "Usuario o contraseña incorrectos";
         $_SESSION['error_login']=$errores['login'];
         header("Location:index.php");
         exit; // Importante salir del script después de redirigir
    }
} else {
    $_SESSION['error_login']=$errores['login'];
    header("Location:index.php");
    exit; // Importante salir del script después de redirigir
}
}