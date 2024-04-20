<?php
include 'datos.php';
$errores = [];
//recoger el array, el nombre del select y el titulo
function creaSelect(array $array, String $nombre, String $titulo):void{
    echo "<label for='$nombre'>$titulo:</label>
    <select id='$nombre' name='$nombre' >";
    foreach($array as $valor){
        echo "<option value='$valor'>" . ucfirst($valor) . "</option>";
    }
    echo "</select><br><br>";
}


//Comprobar fecha  correcta
//*******HE DE HACER************************************ */
//Poner el array de errores, el nombre del campo para generar el error con la clave campo
//function compruebaHora(String $fechaInput, array &$errores, String $nombre):bool{
//******************************************* */
function compruebaFecha(String $fechaInput):bool{
    //Comprobar si la fecha que recogemos es mayor que la de hoy
    $fechaActual = date("Y-m-d");
    //Comprueba fecha válida con la función creada fechaValida()
    if(fechaValida($fechaInput)){
        //Convertir fecha formato Unix
        $fechaInputUnix = strtotime($fechaInput);
        $fechaActualUnix = strtotime($fechaActual);

        //Devuelve true si la fecha que ingresamos es mayor a la actual
        return ($fechaInputUnix > $fechaActualUnix);
    } else {
        
        return false;
        //Crear el error
    }
}

function fechaValida(String $fecha):bool{
    // El formato del input cuando lo recoge es de Año - mes - día (Y-m-d)
    list($anyo, $mes, $dia) = explode("-", $fecha);
    //Retorna true o false la forma de recoger los datos checkdate() es (m-d-Y) 
    return (checkdate((int)$mes, (int)$dia, (int)$anyo));
}

//Comprobar hora correcta
//*******HE DE HACER************************************ */
//Poner el array de errores, el nombre del campo para generar el error con la clave campo
//function compruebaHora(String $horaInput, array &$errores, String $nombre):bool{
//******************************************* */
function compruebaHora(String $horaInput):bool {
    // Intenta convertir la hora a tiempo Unix
    $tiempoUnix = strtotime($horaInput);

    // Verificar si la conversión fue exitosa y si la hora es válida
    if ($tiempoUnix !== false) {
        // Verificar si la hora convertida es igual a la hora original
        if (date("H:i", $tiempoUnix) === $horaInput) {
            // La hora es válida
            return true;
        } else {
            // La hora no coincide con el formato H:i
            return false;
            //Crear el error
        }
    } else {
        // Error en la conversión de la hora
        return false;
        //Crear el error
    }
}


?>