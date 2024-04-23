<?php
include 'funciones.php';


if (!isset($_REQUEST['submit'])) {
    // header('Location: ejercicio.php');
    //exit;
    include 'altaEvento.php';
} else {
    $nombre_evento = recoge('nombre_evento');
    cTexto($nombre_evento, 'nombre_evento', $errores);

    //Tipo de evento
    $valorTipoDeEvento = recoge('tipo_evento');
    cSelect( $valorTipoDeEvento, 'tipo_evento', $errores, $tipoEvento);

    //Las funciones hechas por mí, podrían recoger el string del nombre del campo y 
    //ver si están vacías o llenas, devolverían true/false y rellenarían
    //en caso de false el array $errores. Por ahora recojo el valor y guardo
    //en una variable. 
    $hora = recoge('hora_evento');//$_REQUEST['hora_evento'];
    $fecha = recoge('fecha_evento');//$_REQUEST['fecha_evento'];
    // echo $hora;
    // echo "<br> $fecha";
    //Compruebo que la fecha y la hora esté bien
    compruebaHora($hora, $errores, 'hora_evento');
    compruebaFecha($fecha, $errores, 'fecha_evento');
    
    //Campo ubicación del evento
    $ubicacion = recoge('ubicacion');
    cTexto($ubicacion, 'ubicacion', $errores);

    //Descripción del evento
    $descripcion = recoge('descripcion');
    cTexto($descripcion, 'descripcion', $errores);

    //Subir imagen, se comprueba si se ha subido y da true si lo consigue
    //El el archivo datos.php he puesto $extensionesValidas, $directorio, $max_file_size, se ha de cambiar el nombre por conf.php
    //Al no ser obligada se pone false 
    $imagen = cFile('imagen',$errores, $extensionesValidas, $directorio, $max_file_size, false);

    // echo "<br>";
    // echo compruebaHora($hora, $errores, 'hora_evento') ? "<br>Hora Bien" : "<br>Hora Mal";
    // echo "<br>";
    // echo compruebaFecha($fecha, $errores, 'fecha_evento') ? "<br>Fecha Bien" : "<br>Fecha Mal";
    // echo "<br>";
    // print_r($errores);
    // echo "<br>";
    echo "<br>";
    if (!empty($errores)) {
        // header('Location: ejercicio.php');
        //exit;
        include 'altaEvento.php';
        echo "Error";
    } else {
        echo "<p>$nombre_evento</p>";
        echo"<p> $valorTipoDeEvento</p>";
        echo "<p>Hora $hora </p>";
        echo "<p>Hora $fecha </p>";
        echo "<p>$ubicacion</p>";
        echo "<p>$descripcion</p>";
        echo "<img src = '$imagen' >";
    }

}
