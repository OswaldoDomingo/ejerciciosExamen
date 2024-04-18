<?php
//Ejercicio 1 Realiza una función denominada escribirTresNumeros que reciba tres números enteros como parámetros 
//y proceda a escribir dichos números en tres líneas en un archivo denominado datosEjercicio.txt. 
//Si el archivo no existe, debe crearlo. Devolverá true si la operación se ha realizado con éxito y false en caso contrario. 
//El fichero no tendrá nunca más de 3 números.

include './libs/bGeneral.php';
include 'funciones.php';

$errores = [];

if(!isset($_POST['enviar'])){
    include('formulario.php');
} else{
    
    $numero1=recoge('numero1');
    $numero2=recoge('numero2');
    $numero3=recoge('numero3');

    if(empty($errores)){

        cNum($numero1, 'numero1', $errores, true);  
        cNum($numero2, 'numero2', $errores, true);  
        cNum($numero3, 'numero3', $errores, true);

        //Hasta aquí hemos sanitizado lo recogido y comprobado que sean números enteros
        //Llamar a la función para que escriba los tres números en el archivo

        if(empty($errores)){
            $resultado = escribirTresNumeros($numero1, $numero2, $numero3);
            if($resultado) {
                echo "Esto debería escribir el archivo";
                echo "$numero1, $numero2, $numero3";
            } else {
                echo "Error al escribir en el archivo";
                echo "$numero1, $numero2, $numero3";
            }
        }
        else {
            echo "Error en los datos";
        }
    }else {
        echo "Error en los datos";

}

}

?>