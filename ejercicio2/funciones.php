<?php
function obtenerSuma($fichero){
    $suma = 0;
    $archivo = fopen($fichero, 'r');

    // Recorrer el fichero y leer línea por línea los números
    // Como son texto, hay que convertirlos a entero para poder sumarlo
    if($archivo){
        while(!feof($archivo)){
            $linea = fgets($archivo);
            $linea = intval($linea);
            $suma += $linea;
        }
    }

    // Calcular la suma


    // Cerrart el fichero
    fclose($archivo);

    return $suma;



}