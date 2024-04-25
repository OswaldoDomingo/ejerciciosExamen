<?php
include('libs/bGeneral.php');
include ('config.php');

$deportes = recoge('deporte');
echo gettype($deportes);
echo "<br>";
echo $deportes;
echo "<br>";
$deportesUn = unserialize($deportes);
echo gettype($deportesUn);
echo "<br>";
echo "Deportes que practica: ";
echo "<br>";
foreach (($deportesUn) as $deporte) {
    echo $deporte . " ";
    echo "<br>";
}