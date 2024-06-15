<?php ob_start(); ?>
<h4>LISTA USUARIOS</h4>

<?php
foreach ($usuarios as $usuario) {
    echo "<a href='index.php?ctl=borrarUsuario&usuario_id=" . $usuario['usuario_id'] . "'>Borrar</a> - " . $usuario['usuario_nombre'] . " - " . $usuario['usuario_correo'] . "<br>";
}
$contenido = ob_get_clean();
include 'layout.php';
?>
