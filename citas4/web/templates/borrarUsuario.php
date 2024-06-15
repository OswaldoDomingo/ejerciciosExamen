<?php
ob_start();
?>
<h4>BORRA USUARIO</h4>

<?php
$_GET['usuario'] = filter_input(INPUT_GET, 'usuario', FILTER_SANITIZE_NUMBER_INT);
$borrar_usuario =  $_GET['usuario'];

borrarUsuario($borrar_usuario);

header("Location: index.php?ctl=home");

$contenido = ob_get_clean();
include 'layout.php';
?>
