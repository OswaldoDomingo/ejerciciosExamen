<?php
require_once("modeloConexion.php");

class ModeloLogin{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new ModeloConexion();
    }

    function comprobarLogin($usuario, $clave, &$errores){
        $consulta = "SELECT usuario_correo, usuario_password FROM usuario WHERE usuario_correo=:usuario";

        try{
            $stmt=$this->conexion->prepare($consulta);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if($resultado){
                if($clave == $resultado['usuario_password']){
                    return true;
                } else {
                    $errores['pass'] = "Contraseña no válida";
                    return false;
                }
            } else {
                $errores['usuario'] = "Usuario no registrado";
                return false;
            }

        }catch(PDOException $e){
            echo "Error " . $e->getMessage();
            return false;
        }

    }

    function datosUsuario(){
        $consulta = "SELECT usuario_nombre, usuario_correo, usuario_imagen, usuario_nivel FROM usuario";
        //Recuperar los datos del usuario   
        try{
            $stmt=$this->conexion->prepare($consulta);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // $_SESSION['usuario'] = $resultado[0]['usuario_nombre'];
            // $_SESSION['correo'] = $resultado[0]['usuario_correo'];
            // $_SESSION['imagen'] = $resultado[0]['usuario_imagen'];
            // $_SESSION['nivel'] = $resultado[0]['usuario_nivel'];
            return $resultado;                                                                                                                                      
    } catch(PDOException $e){
        echo "Error " . $e->getMessage();
        return false;
    }

}


}
?>