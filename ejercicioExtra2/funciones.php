<?php
//validar correo
function valida_correo(String $correo, array &$errores, bool $requerido = true):bool{
    //Si no es requerido devuelve true
    if (!$requerido && empty($correo)) {
        return true; // Permitir entrada vacía si no es requerida
    }
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        $errores['email'] = "Error en el correo";
        return false;
    }
}

//Fecha de nacimiento válida y mayor de 14 años
function valida_fecha($fechaInput, &$errores, bool $requerido=TRUE):bool{
    $fechaValida = false;
    
    //Si no es requerido devuelve true
    if (!$requerido && empty($fechaInput)) {
        $fechaValida = true; // Permitir entrada vacía si no es requerida
    }
    
    //Calcular la fecha Unix de hoy
    //$fechaActual = strtotime(date("Y-m-d"));
    
    //Variable para indicar si es verdadero/falso la fecha que entra por el input
    $fechaNacimiento = strtotime($fechaInput);

    //Si la fecha no es válida o el campo está vacío da false
    if( $fechaNacimiento === false){
        $errores['fecha_nacimiento'] = "Error en el campo fecha";
        $fechaValida = false;
    }
    
    // Calcular la edad del usuario en segundos (aproximadamente)
     //$edadUsuario = $fechaActual - $fechaNacimiento;

     // Calcular la cantidad de segundos en 14 años
     //$edadMinimaSegundos = 14 * 365 * 24 * 60 * 60; //Calculando 365 días el año
    // Se hace la resta entre la edasd mínima y la fecha de nacimiento del usuario
    // Eso da una cantidad de segundos, si esa cantidad es mayor o igual a 14 años es true y si no será false


    //Comprobar si entre la fecha de nacimiento y la actual es mayor o igual a 14 años usando DateTime() para incluir los años bisiestos 
     if(calcula_anyos($fechaInput)){
        $fechaValida = true;
     } else {
        $errores['fecha_nacimiento'] = "El usuario debe tener al menos 14 años de edad.";
        $fechaValida = false;
     }

     return $fechaValida;

}
//Calcular los años incluyendo los bisiestos
function calcula_anyos(string $edad):bool{
    $fechaNacimiento = new DateTime($edad);
    $fechaActual = new DateTime('now');
    $intervalo = $fechaActual->diff($fechaNacimiento);
    //Se necesita acceder a la propiedad y del objeto DateInterval, que representa el número de años en el intervalo.
    return ($intervalo->y >= 14) ? true : false;
}
//Imagen extensiones, tamaño de bGeneral

function mostrar_errores(array $errores, string $campoInput):String{
    if(key_exists($campoInput, $errores)){
        return $errores[$campoInput];
    }
        return "";
}



