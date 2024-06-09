
<?php  ob_start();
    if(isset($params['mensaje'])){
        echo $params['mensaje'];
    }
?>

<h4>Citas públicas</h4>
<div class="citas">
<?php
    foreach($citas as $cita){
        echo "<p>".$cita['citas_texto']  . "<span class='autor'>" .$cita['citas_fuente'] . "</span></p>";
        
    }
    echo "</div>";
    $contenido = ob_get_clean();
    include 'layout.php';
?>


