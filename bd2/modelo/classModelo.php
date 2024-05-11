<?php
include ('../libs/classConfig.php');

class modelo extends PDO
{

    
    // El constructor se encarga de crear la conexión
    public function __construct()
    {

        /* Los datos de la conexión los tomamos de config */
        parent::__construct('mysql:host=' . Config::$hostname . ';dbname=' . Config::$nombre . '', Config::$usuario, Config::$clave);
        
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::exec("set names utf8");
    }

  
    

    function selectLocalidadesForm(){
   
        $consulta= "SELECT * FROM localidades";
    $array=[];
        if($resultado=$this->query($consulta)){
    
            $arrayresultado=$resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado=null;
        }
    //Devuelve  un array de manera que podemos pintar el Select de la forma habitual
    //La key es id_localidad y el valor la localidad
        foreach($arrayresultado as $key=>$valor){

            $array["{$valor['id_localidad']}"]=$valor['localidad'];
        }
        
        return $array;
      
    }
}
?>