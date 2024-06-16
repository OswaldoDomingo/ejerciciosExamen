<?php ob_start(); 
    if(isset($params['mensaje'])){
        echo "<h3>".$params['mensaje']."</h3>";
    }
?>
<h4>TUS CITAS</h4>
<div class="listaEditar">
<?php
foreach ($citas as $cita) {
    echo "<div class='editar'><a href='index.php?ctl=editarCita&id=" . $cita['citas_id'] . "'>Editar</a> " . htmlspecialchars($cita['citas_texto']) . " " . htmlspecialchars($cita['citas_fuente']) . "</div><br>";
}
?>
</div>
<?php
$contenido = ob_get_clean();    
include 'layout.php';
?>
