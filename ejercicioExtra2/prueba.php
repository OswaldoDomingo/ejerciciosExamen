<?php
require 'libs/bGeneral.php';
require 'config.php';

// print_r($valoresDeportes);

// $deportesSerializados = serialize($valoresDeportes);

// echo "<br>";

// print_r($deportesSerializados);

// echo "\n";

// $deportesDeserializados = unserialize($deportesSerializados);



echo "\n";

foreach($deportesDeserializados as $valor)
{
    echo $valor;
    echo "\n";
};

?>