<?php
    include('libs/bGeneral.php');
    include ('config.php');

    //$deportes = $_REQUEST['deportes'];
    $deportes = recogeArray('deportes');
    echo "Deportes que practica: ";
    echo "<br>";
    foreach ($deportes as $deporte) {
        echo $deporte . " ";
        echo "<br>";

    }
    $deporteSerializado = serialize($deportes);
    echo "Deportes serializados: ";
    echo "<br>";
    echo $deporteSerializado;
    echo "<br>";
    $deportesDeserializados = unserialize($deporteSerializado);
    echo "Deportes deserializados: ";
    echo "<br>";
    foreach ($deportesDeserializados as $deporte) {
        echo $deporte . " ";
        echo "<br>";
    }

    echo "<br>";

    echo "<a href='pruebaConforme.php?deporte=$deporteSerializado'>Enviar datos</a>"
?>

