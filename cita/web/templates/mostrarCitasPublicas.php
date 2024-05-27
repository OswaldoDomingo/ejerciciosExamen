<?php
ob_start();
echo '<h1>' . htmlspecialchars($params['mensaje']) . '</h1>';
foreach($params['citas'] as $cita){
    echo '<div class="cita">';
    echo '<p><b>' . htmlspecialchars($cita['citas_fuente']) . '</b></p>';
    echo '<p>' . htmlspecialchars($cita['citas_texto']) . '</p>';
    echo '</div>';
}
$contenido = ob_get_clean();
include 'layout.php';

?>