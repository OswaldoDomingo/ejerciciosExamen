<?php
    function conectar(){

        $host = "localhost";
        $baseDatos = "citas";
        $usuario = "citas";
        $password = "citas";
     try{
         $dns = "mysql:host=$host;dbname=$baseDatos;charset=utf8";
         $conexion = new PDO($dns, $usuario, $password);
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         return $conexion;
        
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

?>