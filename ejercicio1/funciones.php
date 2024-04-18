<?php

function escribirTresNumeros($valor1, $valor2, $valor3){
    
    //Crear archivo datosEjercicio.txt si no existe
    $archivo = fopen('datosEjercicio.txt', 'a+');
    
    //Comprobar que el archivo existe
    if(file_exists('datosEjercicio.txt')){
        
        //Comprobar que el archivo esté vacío
        $tamano = filesize('datosEjercicio.txt');
    }

    
    //escribir los tres números si está vacío
    if($tamano === 0){
        $numeros = "$valor1 \n$valor2 \n$valor3";
        fwrite($archivo, $numeros);
        //devolver true si todo fué correcto
        return true;
    } else {
    //devolver false si hubo algún error
        return false;
    }
    //cerrar el archivo
    fclose($archivo);
}

function recogeNumeros($valor1, $valor2, $valor3){
    $numeros = "$valor1 <br> $valor2 <br> $valor3";
    echo $numeros;
}

?>