<?php
include 'datos.php';
$errores = [];
//recoger el array, el nombre del select y el titulo
function creaSelect($array, $nombre, $titulo){
    echo "<label for='$nombre'>$titulo:</label>
    <select id='$nombre' name='$nombre' >";
    foreach($array as $valor){
        echo "<option value='$valor'>" . ucfirst($valor) . "</option>";
    }
    echo "</select><br><br>";
}

function compruebaFecha($fechaInput){
    //Comprobar si la fecha que recogemos es mayor que la de hoy
    $fechaActual = date("Y-m-d");

    //Convertir fecha formato Unix
    $fechaInputUnix = strtotime($fechaInput);
    $fechaActualUnix = strtotime($fechaActual);

    //Devuelve true si la fecha que ingresamos es mayor a la actual
    return ($fechaInputUnix > $fechaActualUnix);
}

function compruebaHora($horaInput){
    
}


?>