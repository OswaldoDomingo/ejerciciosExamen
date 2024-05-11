<?php

include('../libs/classConfig.php'); //están host, base datos, pass,

class modelo extends PDO{
    //Crear conexión con el constructor
    public function __construct()
    {
        parent::__construct("mysql:host=" . Config::$hostname . ";dbname=" . Config::$nombre . ";charset=utf8", Config::$usuario, Config::$clave);

        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::exec("set names utf8");
    }
    
    function selectCitas(){
        $consulta = "SELEC * FROM citas";
        $array = [];
        if($resultado=$this->query($consulta)){
            $array_resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor();
            $resultado=null;
        }
        
        //Devuelve un array donde se pintarán todas las citas
        foreach($array_resultado as $clave=>$valor){
            $array["{$valor['cita_id']}"]=$valor['cita_texto'];
        }
        return $array;
    }









}
 
 
 
 
 
 
 
 ?>