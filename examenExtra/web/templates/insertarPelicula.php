<?php
ob_start();
?>
<h1>Nueva Pelicula</h1>

<form action="index.php?ctl=insertarPelicula"  method="POST"  enctype="multipart/form-data">

	<label>Título</label><br>
	<input type="text" name="titulo"><br>
	<br> <label>Resumen</label><br>
	<textarea name="resumen" rows="5"></textarea>
	<br>
	<label for="fecha"></label>
	<br>
	<input type="date" name="fecha" id="fecha">
	<br> <label>Duracion</label><br>
	<input type="text" name="duracion"><br><br>
	<br> <input type="submit" name="bAceptar" value="Enviar datos"> <br>
</form>
<?php
$contenido = ob_get_clean();
include 'layout.php';
?>