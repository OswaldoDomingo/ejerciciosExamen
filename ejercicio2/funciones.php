<?php
function obtenerSuma($fichero){
    $suma = 0;
    $archivo = fopen($fichero, 'r');

    // Recorrer el fichero y leer línea por línea los números
    if($archivo){
        while(!feof($archivo)){
            $linea = fgets($archivo);

            // Como son texto, hay que convertirlos a entero para poder sumarlo
            $linea = intval($linea);
            
            // Calcular la suma
            $suma += $linea;
        
        }
    }
    // Cerrart el fichero
    fclose($archivo);

    return $suma;
}