<?php
function creaSelect(object $conexion):array{

    try{
        $sqlConsultaLocalidades = "SELECT * FROM localidades";
        $consultaLocalidades = $conexion->query($sqlConsultaLocalidades);
        // $resultado = $consultaLocalidades->fetchAll(PDO::FETCH_ASSOC);
        return $resultado = $consultaLocalidades->fetchAll(PDO::FETCH_KEY_PAIR);
        
    } catch(PDOException $e){
        //En caso de error
        echo "Error en la consulta: " . $e->getMessage();
    }
}