<?php
// require_once("../database/conexion.php");

function valida_correo(String $correo, String $campo, array &$errores): bool
{
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        $errores[$campo] = "Error al validar el correo";
        return false;
    }
}

function comprobar_correo(object $conexion, String $correo, &$errores): bool
{
    try {

        //Se hace la consulta
        $query = "SELECT usuario_correo FROM usuarios WHERE usuario_correo = :correo";

        //Prepara la sentencia SQ
        $consulta = $conexion->prepare($query);

        //Ejecutar la consulta con el valor del correo
        $consulta->execute(array(':correo' => $correo));

        //Obtener el resultado de la consulta
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        //Verificar si existe correo
        if ($resultado) {
            //El correo ya existe
            $errores['alta_correo'] = "Este correo ya existe en otro usuario";
            return false;
        } else {
            //El correo no existe
            return true;
        }
    } catch (PDOException $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logerr.txt");
        $errores['error_correo'] = "Error al dar de alta el correo";
    }
}

function alta_usuario(object $conexion, String $nombre, String $correo, String $pass, array &$errores): bool
{
    try {

        //Se encripta la contraseña
        $pass = crypt_blowfish($pass);
        //Consulta 
        $query = "INSERT INTO usuarios (nombre_usuario, usuario_correo, usuario_password, usuario_nivel) VALUES (:nombre, :correo, :pass, 2)";

        //Prepara la consulta SQL
        $consulta = $conexion->prepare($query);

        //Ejecuta la consulta con los valores
        $resultado = $consulta->execute(array(':nombre' => $nombre, ':correo' => $correo, ':pass' => $pass));

        if ($resultado) {
            return true;
        } else {
            // Si ocurrió un error durante la inserción, agregar un mensaje de error al array de errores
            $errores['alta_usuario'] = "Error al dar de alta al usuario.";
            return false;
        }
    } catch (PDOException $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logerr.txt");
        $errores['alta_usuario'] = "Error al dar de alta al usuario.";
    }
}

function validar_password(String $password, &$errores, bool $requerido=true):bool{
    //Si no es requerido devuelve true
    if (!$requerido && empty($password)) {
        return true; // Permitir entrada vacía si no es requerida
    }
     // Si es requerido y el campo está vacío, devuelve false
     if ($requerido && empty($password)) {
        $errores['password'] = "La contraseña no puede estar vacía";
        return false;
    }
    //La contraseña ha de tener mínimo 8 caracteres
    if(mb_strlen($password) >= 4){
        return true;
    } else {
        $errores['password'] = "La contraseña no cumple con los requisitros";
        return false;
    }
}