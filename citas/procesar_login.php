<?php
session_start();
// procesar_login.php
require_once("./libs/bGeneral.php");
require_once("./database/conexion.php");

$errores=[];

if(empty($_REQUEST["enviar"])){
    header("Location:index.php");
    exit;
}
if(empty($_REQUEST["usuario"]) || empty($_REQUEST["password"])){
    $error = $error["login"] = "Todos los campos han de estar cumplimentados";
    $_SESSION["error_login"] = $error;
    header("Location:index.php");
    exit;
} else {
    $usuario = recoge("usuario");
    $password = recoge("password");
    cTexto($usuario, 'usuario', $errores);
    //cTexto($password, 'password', $errores);
    if (empty($errores)) {
        try {
            // Establecer conexión a la base de datos
            $conexion = conexion();
            // Verificar si la conexión se ha establecido correctamente
            if ($conexion) {
                // Preparar la consulta
                $queryLogin = "SELECT * FROM usuarios WHERE nombre_usuario = :usuario";
                $consulta = $conexion->prepare($queryLogin);
                // Ejecutar la consulta con el valor del usuario
                $consulta->execute(array(':usuario' => $usuario));
                // Obtener el resultado de la consulta
                $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($resultado as $fila){
                    echo "ID: " . $fila['usuario_id'] . "<br>" . 
                    "Nombre: " . $fila['nombre_usuario'] . "<br>" .
                    "Correo: " . $fila['usuario_correo'] . "<br>" .
                    "Password: " . $fila['usuario_password'] . "<br>" .
                    "Nivel: " . $fila['usuario_nivel'];
                }
            } else {
                // Manejar el caso en el que no se pueda establecer la conexión
                echo "No se pudo establecer la conexión a la base de datos.";
            }
        } catch (PDOException $e) {
            // Manejar cualquier excepción que ocurra durante la conexión o la consulta
            echo "Error: " . $e->getMessage();
        }
    }

    }