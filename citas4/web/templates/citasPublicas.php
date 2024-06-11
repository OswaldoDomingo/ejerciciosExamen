<?php ob_start(); 
if(isset($params['mensaje'])){
    echo "<h3>".$params['mensaje']."</h3>";
}
?>
<h4>CITAS</h4>
<?php
foreach ($citas as $cita) {

    echo $cita['citas_texto'] . " " . $cita['citas_fuente'] . "<br>";

}
$contenido = ob_get_clean();
include 'layout.php';
?>

