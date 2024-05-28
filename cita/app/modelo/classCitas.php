<?php

class Citas extends Modelo
{
    //Método para extraer todas las citas públicas
    public function dameCitasPublicas()
    {
        $consulta = "SELECT * FROM citas WHERE citas_tipo = :citas_tipo";
        $resultado = $this->conexion->prepare($consulta);
        $tipoCitas = 2;
        $resultado->bindParam(':citas_tipo',  $tipoCitas);
        $resultado->execute();
        return $resultado->fetchAll();

    }

    //Método para extraer todas las citas de el usuario
    public function dameCitasUsuario($usuario){
        $consulta = "SELECT * FROM citas WHERE citas_usuario = :citas_usuario";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':citas_usuario', $usuario);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    //Método para sacar las citas de un usuario y que sean públicas
    public function dameCitasUsuarioPublicas($usuario, $publicas){
        $consulta = "SELECT * FROM citas WHERE citas_usuario = :citas_usuario AND citas_tipo = :citas_tipo";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':citas_usuario', $usuario);
        $resultado->bindParam(':citas_tipo', $publicas);
        $resultado->execute();
        return $resultado->fetchAll();

    }

    //Insertar usuario

    public function insertarUsuario($nombre, $edad, $imagen, $acceso, $localidad, $correo, $pass){
        $consulta = "INSERT INTO usuario (usuario_nombre, usuario_edad, usuario_imagen, usuario_acceso, usuario_localidad, usuario_correo, usuario_pass) VALUES (:nombre, :edad, :imagen, :acceso, :localidad, :correo, :pass)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':nombre', $nombre);
        $resultado->bindParam(':edad', $edad);
        $resultado->bindParam(':imagen', $imagen);
        $resultado->bindParam(':acceso', $acceso);
        $resultado->bindParam(':localidad', $localidad);
        $resultado->bindParam(':correo', $correo);
        $resultado->bindParam(':pass', $pass);

        $resultado->execute();
        return $resultado;
    }

    //Insertar cita
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
        $consulta = "SELECT * FROM usuario WHERE usuario_nombre = :usuario_nombre";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':usuario_nombre', $nombreUsuario);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function registrarUsuario($usuario_nombre, $usuario_edad, $usuario_imagen, $uusuario_acceso, $usuario_localidad, $usuario_correo, $usuario_pass){
        $consulta = "INSERT INTO usuario (usuario_nombre, usuario_edad, usuario_imagen, usuario_acceso, usuario_localidad, usuario_correo, usuario_pass) VALUES (:usuario_nombre, :usuario_edad, :usuario_imagen, :usuario_acceso, :usuario_localidad, :usuario_correo, :usuario_pass)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':usuario_nombre', $usuario_nombre);
        $resultado->bindParam(':usuario_edad', $usuario_edad);
        $resultado->bindParam(':usuario_imagen', $usuario_imagen);
        $resultado->bindParam(':usuario_acceso', $uusuario_acceso);
        $resultado->bindParam(':usuario_localidad', $usuario_localidad);
        $resultado->bindParam(':usuario_correo', $usuario_correo);
        $resultado->bindParam(':usuario_pass', $usuario_pass);

        $resultado->execute();
        return $resultado;

    }

    public function pintaLocalidades(){
        $consulta = "SELECT * FROM localidad";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll();
    }
}