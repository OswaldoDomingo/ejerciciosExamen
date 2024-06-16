<?php ob_start(); ?>
<h4>LISTA USUARIOS</h4>
<h5>AVISO IMNPORTANTE: CUANDO BORRES UN USUARIO BORRARÁS TODAS SUS CITAS.</h5>
<div class="listado">
<?php
foreach ($usuarios as $usuario) {
    echo "<a href='index.php?ctl=borrarUsuario&usuario_id=". $usuario['usuario_id'] . "'>Borrar</a> - " . $usuario['usuario_nombre'] . " - " . $usuario['usuario_correo'] . "<br>";
}
?>
</div>
<?php
$contenido = ob_get_clean();
include 'layout.php';
?>
