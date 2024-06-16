<?php
ob_start();
?>




<h1>Bienvenid@</h1>
<?php	
if (isset($params['mensaje'])) {
    echo "<h2>" . $params['mensaje'] . "</h2>";
}
?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
