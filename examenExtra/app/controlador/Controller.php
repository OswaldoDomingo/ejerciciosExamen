<?php

class Controller
{

    public function inicio()
    {
        $params['mensaje'] = 'Bienvenido al examen de Servidor de la Convocatoria Extraordinaria'; 

        
        
            try {                                        
                
                
            } catch (PDOException $e) {
                // En este caso guardamos los errores en un archivo de errores log
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
                // guardamos en ·errores el error que queremos mostrar a los usuarios
                header ("location:index.php?ctl=error");
            } 
        

        require __DIR__ . '/../../web/templates/inicio.php';
    }

    

    public function error()
    {
        
        
        require __DIR__ . '/../../web/templates/error.php';
    }

    
   
}
