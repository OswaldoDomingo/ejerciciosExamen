<?php
$errores = [];

if (isset($_POST['enviar'])) {
    require_once '../model/ModeloConexion.php';
    require_once '../libs/bGeneral.php';

    $email = recoge('email');
    $password = recoge('password');
    if (empty($errores)) {
        session_start();
        $conexion = new ModeloConexion();

        $consulta = $conexion->prepare("SELECT * FROM usuario WHERE usuario_correo = :email");
        $consulta->bindParam(':email', $email);
        $consulta->execute();
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($password, $usuario['usuario_clave'])) {
                $_SESSION['usuario'] = $usuario['usuario_nombre'];
                $_SESSION['correo'] = $usuario['usuario_correo'];
                $_SESSION['imagen'] = $usuario['usuario_imagen'];
                $_SESSION['nivel'] =  $usuario['usuario_nivel'];
                header('Location: ../seguro.php');
                exit();
            } else {
                // Limpiar mensajes de sesión previos
                unset($_SESSION['usuario']);
                unset($_SESSION['clave']);
                $_SESSION['clave'] = "La contraseña es incorrecta";
                header('Location: ../index.php');
            }
        } else {
            // Limpiar mensajes de sesión previos
            unset($_SESSION['usuario']);
            unset($_SESSION['clave']);
            $_SESSION['usuario'] = "Usuario no está registrado";
            header('Location: ../index.php');
        }
    }
}
