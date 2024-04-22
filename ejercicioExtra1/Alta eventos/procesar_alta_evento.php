<?php
include 'funciones.php';
if (!isset($_REQUEST['submit'])) {
    header('Location: ejercicio.php');
    exit;
} else {
    $nombre_evento = recoge('nombre_evento');
    cTexto($nombre_evento, 'nombre_evento', $errores);

    //Las funciones hechas por mí, podrían recoger el string del nombre del campo y 
    //ver si están vacías o llenas, devolverían true/false y rellenarían
    //en caso de false el array $errores. Por ahora recojo el valor y guardo
    //en una variable. 
    $hora = $_REQUEST['hora_evento'];
    $fecha = $_REQUEST['fecha_evento'];
    // echo $hora;
    // echo "<br> $fecha";
    //Compruebo que la fecha y la hora esté bien
    compruebaHora($hora, $errores, 'hora_evento');
    compruebaFecha($fecha, $errores, 'fecha_evento');

    // echo "<br>";
    // echo compruebaHora($hora, $errores, 'hora_evento') ? "<br>Hora Bien" : "<br>Hora Mal";
    // echo "<br>";
    // echo compruebaFecha($fecha, $errores, 'fecha_evento') ? "<br>Fecha Bien" : "<br>Fecha Mal";
    // echo "<br>";
    // print_r($errores);
    // echo "<br>";
    echo "<br>";
    if (!empty($errores)) {
        header('Location: ejercicio.php');
        exit;
    } else {
        echo "<p>Hora $hora </p>";
        echo "<p>Hora $fecha </p>";
        echo "<p>$nombre_evento</p>";
    }
}
