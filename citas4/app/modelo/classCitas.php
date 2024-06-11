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
        $consulta = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':usuario', $usuario);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }


}