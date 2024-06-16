<?php 

ob_start(); 
?>

<div>
<h1>Listado de peliculas</h1>
<table>
<thead>
	<tr>
		
		<th scope="col">Título</th>
			</tr>
	 </thead>
  <tbody>
 
		<!--Aqui mostramos los datos de las peliculas -->
		
		
</tr>
 </tbody>
 
 </table>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>