<?php
    function contarVisitas($archivo){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Se pone el contador a 0
            $contador = 0;
            
            // Si el archivo existe
            if(file_exists($archivo)){
                //Ponemos en la variable $contador el valor que tiene
                $contador = (int)   ($archivo);
            }
            // Se le suma 1 a $contador
            $contador ++;

            // Se escribe en el archivo el valor de la variable $contador
            file_put_contents($archivo, $contador);
        }
        return $contador;
    }
        ?>
