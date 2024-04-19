<?php
    include 'funciones.php';

    $hora = $_REQUEST['hora_evento'];
    echo $hora;
    $fecha = $_REQUEST['fecha_evento'];
    echo "<br> $fecha";
    echo "<br>";
    echo compruebaHora($hora)?"Hora Bien":"Hora Mal";
    echo "<br>";
    echo compruebaFecha($fecha)?"Fecha Bien":"Fecha Mal";
    echo "<br>";


    echo "<br>";

?>