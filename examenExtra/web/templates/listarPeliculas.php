<?php 

ob_start(); 
?>

<div>
<h1>Listado de peliculas</h1>

<?php
	foreach($peliculas as $pelicula){
		echo $pelicula['fechaCreacion'];
		echo "<br>";
		echo $pelicula['resumen'];
		echo "<br>";
		echo $pelicula['titulo'];
		echo "<br>";
		echo $pelicula['duracion'];
		echo "<br>";

	}

?>
<table>
<thead>
	<tr>
		
		<th scope="col">Título</th>
			</tr>
	 </thead>
  <tbody>
	
	
		
		
</tr>
 </tbody>
 
 </table>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>