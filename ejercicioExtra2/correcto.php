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
$deportes = recoge('deportes');
echo strlen($deportes);
foreach(unserialize($deportes) as $deporte){
    echo $deporte;
}
// echo $deportes;
// $serialiced_data = urldecode($deportes);
// $arrayDeportes = explode(",", $serialiced_data);
// print_r($arrayDeportes);
echo "<br>";
if($imagen != 1){
    echo "<img src='$imagen' >";
}
echo "<br>";


?>