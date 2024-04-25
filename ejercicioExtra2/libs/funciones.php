<?php
//validar correo
function validar_correo(String $correo, array &$errores, bool $requerido = true):bool{
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
function validar_fecha($fechaInput, &$errores, bool $requerido=TRUE):bool{
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
    if(mb_strlen($password) >= 8){
        return true;
    } else {
        $errores['password'] = "La contraseña no cumple con los requisitros";
        return false;
    }
}

function validar_telefono(string $InputTelefono, &$errores, bool $requerido = true):bool{
    //Si no es requerido devuelve true
    if (!$requerido && empty($InputTelefono)) {
        return true; // Permitir entrada vacía si no es requerida
    }
    // Si es requerido y el campo está vacío, devuelve false
    if ($requerido && empty($InputTelefono)) {
        $errores['telefono'] = "Error en el teléfono, ha de rellenarse";
        return false;
    }
    //El teléfono ha de ser un número entero de 9 cifras, sin espacios enmedio
    if(ctype_digit($InputTelefono) && (mb_strlen($InputTelefono) === 9)){
        return true;
    } else {
        $errores['telefono'] = "Error en el teléfono";
        return false;
    }

}

function crear_radio(String $name, array $listaRadio, String $titulo):void{
    echo "<label>$titulo:</label>";
    foreach ($listaRadio as $valor) {
        echo "<input type='radio' id='$valor' name='$name' value='$valor'>
        <label for='$valor'>" . ucfirst($valor) . "</label>";
    }
}

function crear_checkbox(String $name, array $listaCheck, String $titulo):void{
    echo "<label>$titulo:</label><br>";
    foreach ($listaCheck as $valor) {
        echo "<input type='checkbox' id='$valor' name='" . $name . "[]' value='$valor'>
        <label for='$valor'>" . ucfirst($valor) . "</label><br>";
    }
}
