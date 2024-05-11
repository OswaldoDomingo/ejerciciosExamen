<?php
require_once("conexion.php");
require_once("bGeneral.php");
if (isset($_REQUEST['enviar'])) {
    validar_credenciales();
} else {
    $errores['login'] = "Error login";
    header("Location:index.php?ctl=inicio");
    exit();
}
function validar_credenciales()
{

    $usuario = recoge('usuario');
    $pass = recoge('password');
    $errores = [];

    cTexto($usuario, 'usuario', $errores);

    if (empty($errores)) {
        try {

            $conexion = conectar();
            $sql = "SELECT usuario_correo, usuario_password FROM usuario WHERE usuario_correo = :usuario AND usuario_password = :pass";

            $consuta = $conexion->prepare($sql);

            $consuta->bindParam(':correo', $correo);

            $consuta->execute();

            //Obtener el resultado de la consulta
            $usuario = $consuta->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                //Compara los password
                if (password_verify($pass, $usuario['usuario_password'])) {
                    session_start();
                    $_SESSION['usuario_id'] = $usuario['usuario_id'];
                    $_SESSION['usuario_correo'] = $usuario['usuario_correo'];
                    $_SESSION['usuario_nivel'] = $usuario['usuario_nivel'];

                    //Redirigir donde sea
                    header("");
                    exit();
                } else {
                    $errores['password'] = "Error en la contraseña";
                }
            } else {
                $errores['correo'] = "Error en el correo";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
