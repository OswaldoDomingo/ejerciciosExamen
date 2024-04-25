<?php
require_once('libs/bGeneral.php');

$nombre = recoge('nombre');
$email = recoge('email');
$nombreUsuario = recoge('usuario');
$nacimiento = recoge('fechaNacimiento');
$genero = recoge('genero');
$telefono = recoge('telefono');
$imagen = recoge('imagen');
$deportes = recoge('deportes');

echo $nombre;
echo "<br>";
echo $email;
echo "<br>";
echo $nombreUsuario;
echo "<br>";
echo $genero;
echo "<br>";
echo $telefono;
echo "<br>";
// echo $tipo . "-> Array";
// echo "<br>";
// echo $tipoSerialize . "-> Serialize";
// echo "<br>";
// print_r($array);
// echo "<br>";
echo "Deportes que practica: ";
echo "<br>";
//echo strlen($deportes);
$resultado=unserialize($deportes);

foreach($resultado as $deporte){
    echo $deporte;
    echo "<br>";
}

echo "<br>";
if($imagen != 1){
    echo "<img src='$imagen' >";
}
echo "<br>";



?>