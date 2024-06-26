<?php
// Path: app/modelo/classCitas.php
class Citas extends Modelo {
    public function __construct() {
        parent::__construct();
    }
    public function verCitasInvitado(){
        $consulta = "SELECT * FROM citas WHERE citas_tipo = 2";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verCitaUsuario($usuario_id){
        $consulta = "SELECT * FROM citas WHERE citas_usuario = :usuario";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':usuario', $usuario_id);
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

    public function consultarCorreo($correo){
        $consulta = "SELECT * FROM usuario WHERE usuario_correo = :correo";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':correo', $correo);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($nombre, $email, $edad, $contrasenya){
        $acceso = 2;
        $consulta = "INSERT INTO usuario (usuario_nombre, usuario_correo, usuario_acceso, usuario_edad, usuario_pass) VALUES (:nombre, :email, :acceso, :edad, :contrasenya)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':nombre', $nombre);
        $resultado -> bindParam(':email', $email);
        $resultado -> bindParam(':acceso', $acceso);
        $resultado -> bindParam(':edad', $edad);
        $resultado -> bindParam(':contrasenya', $contrasenya);
        $resultado->execute();
    }
    public function insertarCita($usuario_id, $cita_texto, $cita_fuente, $cita_tipo) {
        $consulta = "INSERT INTO citas(citas_usuario, citas_texto, citas_fuente, citas_tipo) VALUES (:usuario, :texto, :fuente, :tipo)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':usuario', $usuario_id, PDO::PARAM_INT);
        $resultado->bindParam(':texto', $cita_texto, PDO::PARAM_STR);
        $resultado->bindParam(':fuente', $cita_fuente, PDO::PARAM_STR);
        $resultado->bindParam(':tipo', $cita_tipo, PDO::PARAM_INT);
        $resultado->execute();
    }

    public function listarUsuarios(){
        $consulta = "SELECT * FROM usuario";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function borrarUsuario($usuario_id){
        
        $consulta = "DELETE FROM usuario WHERE usuario_id = :usuario_id";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $resultado->execute();
    }

    public function listaTipos(){
        $consulta = "SELECT * FROM tipo";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function leeCita($id){
        $consulta = "SELECT * FROM citas WHERE citas_id = :citas_id";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':citas_id', $id);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function editaCita($id, $usuario, $texto, $fuente, $tipo) {
        $consulta = "UPDATE citas SET citas_usuario = :usuario, citas_texto = :texto, citas_fuente = :fuente, citas_tipo = :tipo WHERE citas_id = :id"; 
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':id', $id);
        $resultado->bindParam(':usuario', $usuario);
        $resultado->bindParam(':texto', $texto);
        $resultado->bindParam(':fuente', $fuente);
        $resultado->bindParam(':tipo', $tipo);
        $resultado->execute();
    }

}