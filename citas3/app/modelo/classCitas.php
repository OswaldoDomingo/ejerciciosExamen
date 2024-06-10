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

    public function listaLocalidades(){
        $consulta = "SELECT * FROM localidad";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($usuario_nombre, $edad, $acceso, $clave, $email){
        $consulta = "INSERT INTO usuario (usuario_nombre, usuario_edad,  usuario_acceso, usuario_correo, usuario_pass) VALUES (:usuario_nombre, :edad, :acceso, :email, :clave)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':usuario_nombre', $usuario_nombre);
        $resultado->bindParam(':edad', $edad);
        $resultado->bindParam(':acceso', $acceso);
        $resultado->bindParam(':clave', $clave);
        $resultado->bindParam(':email', $email);
        $resultado->execute();
        return $resultado;
    }

    public function insertarCita($citas_usuario, $citas_texto, $citas_fuente, $citas_tipo){
        $consulta = "INSERT INTO citas (citas_usuario, citas_texto, citas_fuente, citas_tipo) VALUES (:citas_usuario, :citas_texto, :citas_fuente, :citas_tipo)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':citas_usuario', $citas_usuario);
        $resultado->bindParam(':citas_texto', $citas_texto);
        $resultado->bindParam(':citas_fuente', $citas_fuente);
        $resultado->bindParam(':citas_tipo', $citas_tipo);
        $resultado->execute();
        return $resultado;
        }
        
        public function consultarUsuario($nombreUsuario) {
            $consulta = "SELECT * FROM citas_mvc.usuario WHERE usuario_nombre=:nombreUsuario ";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':nombreUsuario', $nombreUsuario);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }