<?php ob_start();
if (isset($params['mensaje'])) { 
	echo $params['mensaje'] ;
} ?>
<table>
	<tr>
		<th><h4><b>Títulos</b></h4><br></th>		
	</tr>
	
	<?php foreach ($params['libros'] as $libro) :?>
	<tr>
		<td><a href="index.php?ctl=verLibro&idLibro=<?php echo $libro['idLibro']?>" class="tablaP">
		<?php echo $libro['titulo'] ?></a></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>