<?php 
require_once 'Model.php';
class Pelicula extends Model {
    
    public function listarPeliculas(){
        $consulta = "SELECT * FROM pelicula";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarPelicula($fecha, $resumen, $titulo, $duracion){
        $consulta = "INSERT INTO pelicula(fechaCreacion, resumen, titulo, duracion) VALUES(:fecha, :resumen, :titulo, :duracion)";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':fecha', $fecha);
        $resultado->bindParam(':resumen', $resumen);
        $resultado->bindParam(':fecha', $titulo);
        $resultado->bindParam(':duracion', $duracion);
        $resultado->execute();
    }

    public function consultarUsuario($usuario){
        $consulta = "SELECT * FROM users WHERE user = :usuario";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->bindParam(':usuario', $usuario);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }


    
    
    
    
}


?>