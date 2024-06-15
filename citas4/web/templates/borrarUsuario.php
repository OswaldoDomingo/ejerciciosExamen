<?php
ob_start();
?>
<h4>BORRA USUARIO</h4>

<?php
header("Location: index.php?ctl=listarUsuarios");

$contenido = ob_get_clean();
include 'layout.php';
?>
