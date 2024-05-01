<?php
function valida_correo(String $correo, String $campo, array &$errores):bool{
    if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        $errores[$campo] = "Error al validar el correo";
        return false;
    }
}
