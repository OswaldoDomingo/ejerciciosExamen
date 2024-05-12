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

}