<?php
include ('classModelo.php');

class empleado extends modelo
{

  

function setEmpleado ($nombre, $puesto, $fecha_nacimiento,$salario, $localidad,$user,$pass){


    $consulta = "INSERT INTO empleados (nombre, puesto, fecha_nacimiento, salario, localidad, user, pass) 
    VALUES (?,?,?,?,?,?,?)";

    $stmt = $this->prepare($consulta);
    $stmt->bindparam(1,$nombre);
    $stmt->bindParam(2, $puesto);
    $stmt->bindParam(3, $fecha_nacimiento);
    $stmt->bindparam(4,$salario);
    $stmt->bindparam(5,$localidad);
    $stmt->bindparam(6,$user);
    $stmt->bindparam(7,$pass);

    ///Pasar array
    return $stmt->execute();
              
}

function getEmpleados (){
    $consulta= "SELECT * FROM empleados";

    if($resultado=$this->query($consulta)){

        $arrayresultado=$resultado->fetchAll(PDO::FETCH_ASSOC);
        $resultado->closeCursor();
        $resultado=null;
        return $arrayresultado;
        
}
}

function verificaEmpleado ($user){
    $consulta= "SELECT id, nombre,pass FROM empleados where user=?";

    $stmt = $this->prepare($consulta);
    $stmt->bindparam(1,$user);
    $stmt->execute();
    $arrayresultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $resultado=null;
    return $arrayresultado;
}
}
?>