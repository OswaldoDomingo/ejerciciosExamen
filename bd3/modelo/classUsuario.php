<?php
include("classModelo.php");

class Usuario extends Modelo{

    function setUsuario($nombre, $correo, $pass, $imagen, $nivel=2){

        $consulta = "INSERT INTO usuario (usuario_nombre, usuario_correo, usuario_password, usuario_imagen, usuario_nivel VALUES (:nombre, :correo, :pass, :imagen, :nivel)";
        
        $stmt = $this->prepare($consulta);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":pass", $pass);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->bindParam(":nivel", $nivel);

        return $stmt->execute();
    }
}