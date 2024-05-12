<?php
include_once("classModelo.php");

class Cita extends Modelo{

    function setCita($cita_texto, $cita_usuario, $cita_autor, $cita_visible){
        
        $consulta = "INSERT INTO citas (cita_texto, cita_usuario, cita_autor, cita_visible) VALUES (:cita_texto, :cita_usuario, :cita_autor, :cita_visible)";
        
        $stmt = $this->prepare($consulta);
        $stmt->bindParam(":cita_texto",$cita_texto);
        $stmt->bindParam(":cita_usuario",$cita_usuario);
        $stmt->bindParam(":cita_usuario",$cita_autor);
        $stmt->bindParam(":cita_visible",$cita_visible);
    
        return $stmt->execute();
    }
//modelo\classCita.php
    function getCita(){
        //Esto va a devolver un array con todas las citas
        $consulta = "SELECT * FROM citas WHERE 1";
        //Preparar la consulta
        $stmt = $this->prepare($consulta);
        //Ejecutar la consulta
        $stmt->execute();

        //Obtener los resultados en un array
        $array_citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Devolver el array de citas
        return $array_citas;
    }

}