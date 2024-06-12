<?php
// Path: app/modelo/classCitas.php
class Citas extends Modelo {
    public function verCitasInvitado(){
        $consulta = "SELECT * FROM citas WHERE citas_tipo = 2";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verCitaUsuario($usuario){
        $consulta = "SELECT * FROM citas WHERE citas_usuario = :usuario";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':usuario', $usuario);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarUsuario($usuario){
        $consulta = "SELECT * FROM usuario WHERE usuario_nombre = :usuario";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':usuario', $usuario);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($nombre, $email, $edad, $contrasenya){
        $consulta = "INSERT INTO usuario (usuario_nombre, usuario_correo, usuario_edad, usuario_pass) VALUES (:nombre, :email, :edad, :contrasenya)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':nombre', $nombre);
        $resultado -> bindParam(':email', $email);
        $resultado -> bindParam(':edad', $edad);
        $resultado -> bindParam(':contrasenya', $contrasenya);
        $resultado->execute();
    }


}