<?php

// ob_start();
?>
<h1>Nueva Pelicula</h1>

<form method="POST" action="index.php?ctl=crear"
	enctype="multipart/form-data">

	<label>Título</label><br> 
	<input type="text" name="titulo"><br>
	<br> <label>Resumen</label><br>
	<textarea name="resumen" rows="5"></textarea>
	<br>
	<br> <label>Duracion</label><br> 
	<input type="text" name="duracion"><br><br>
	<br> <input type="submit" name="bAceptar" value="Enviar datos"> <br> 
	
 <?php //$contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>