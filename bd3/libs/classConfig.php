<?php
class Config{
    static public $hostname = "localhost";
    static public $nombre = "citas";
    static public $usuario = "citas";
    static public $clave = "citas";
    static public $baseDatos = "citas";
}


?>

<?php
require_once("../libs/classConfig.php");

class Modelo extends PDO{
    //Se crea la conexión en el constructor, eso quiere decir que encuanto se instancia o crea un objeto de la clase, este ya lleva la conexión a la base de datos.
    public function __construct()
    {
        parent::__construct('mysql:host=' . Config::$hostname . '
        ;dbname = ' . Config::$nombre . ';charset=utf8', Config::$usuario, Config::$clave);
        
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //parent::exec('');
    
    }
    
    
        
}