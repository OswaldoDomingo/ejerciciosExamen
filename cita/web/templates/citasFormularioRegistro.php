<?php ob_start() ?>
	
	<div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
			<h1 class="h1Inicio">REGISTRARSE</h1>
		</div>
	</div>
	
	<div class="container text-center py-2">
		<div class="col-md-12">
			<?php if(isset($params['mensaje'])) :?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $params['mensaje'] ?></span></b>
			<?php endif; ?>
		</div>
		<div class="col-md-12">
			<?php foreach ($errores as $error) {?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $error."<br>"; ?></span></b>
			<?php } ?>
		</div>
	</div>
	
	<div class="container text-left p-1">
		<form ACTION="index.php?ctl=registro" METHOD="post" NAME="formRegistro">
			<p>* <input TYPE="text" NAME="nombre" VALUE="<?php //echo $params['nombre'] ?>" PLACEHOLDER="Nombre"> <br></p>
			<p>* Fecha nacimiento<input TYPE="date" NAME="edad" VALUE="<?php //echo $params['apellido'] ?>"><br></p>
			<p>* <input TYPE="text" NAME="correo" VALUE="<?php //echo $params['apellido'] ?>" PLACEHOLDER="correo@correo.es"><br></p>
			<p>* <input TYPE="file" NAME="imagen" VALUE="<?php  //echo $params['nombreUsuario'] ?>" PLACEHOLDER="Imagen"><br></p>
			<select name="localidad">
			<?php 
				$conn = new Citas();
				$localidades = $conn->pintaLocalidades();
				foreach($localidades as $localidad){
					echo "<option value='".$localidad['localidad_id']."'>".$localidad['localidad_nombre']."</option>";
				}
				?>
			</select>
			<br>
			<br>
			<p>* <input TYPE="password" NAME="contrasenya" VALUE="<?php //echo $params['contrasenya'] ?>" PLACEHOLDER="Contraseña"><br></p>
			<input TYPE="submit" NAME="bRegistro" VALUE="Aceptar"><br>
		</form>
	</div>
		
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>