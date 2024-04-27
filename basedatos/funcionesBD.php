<?php
function consultaSelect(object $conexion):array{
//Se recoge $conexion y se devuelve un array con los resultados de la consulta
// a la tabla de localidades 1=>'localidad'.
    try{
        $sqlConsultaLocalidades = "SELECT * FROM localidades";
        $consultaLocalidades = $conexion->query($sqlConsultaLocalidades);
        // $resultado = $consultaLocalidades->fetchAll(PDO::FETCH_ASSOC);
        $resultado = $consultaLocalidades->fetchAll(PDO::FETCH_KEY_PAIR);
        return $resultado;
        
    } catch(PDOException $e){
        //En caso de error
        echo "Error en la consulta: " . $e->getMessage();
    }
}