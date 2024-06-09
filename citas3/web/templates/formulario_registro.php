<!-- path:web\templates\formulario_registro.php -->
<form action="" method="post">
    <label for="nombre">Nombre</label>
    <br>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="fecha">Fecha</label>
    <br>
    <input type="date" name="fecha" id="fecha" required>
    <br>
    <label for="imagen">Imagen</label>
    <br>
    <input type="file" name="imagen" id="imagen">
    <br>
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="clave">Clave</label>
    <br>
    <input type="text" name="clave" id="clave" required>
    <br>
    <label for="localidad">Localidad</label>
    <br>
    <select name="localidad" id="localidad">
        <?php 
            $localidades = new Citas();
            $localidades->listaLocalidades();
            foreach($localidades as $localidad){
            echo "<option value='".$localidad['localidad_id']."'>".$localidad['localidad_nombre']."</option>";
        }
        ?>

    <br>
    <label for="acceso">Acceso</label>
    <br>
    <input type="submit" value="Enviar">

</form>