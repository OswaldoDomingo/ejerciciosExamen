<?php ob_start(); ?>
<h2>INSERTAR CITAS</h2>
<?php
if (isset($params['mensaje'])) {
    echo "<h3>" . $params['mensaje'] . "</h3>";
}

foreach ($errores as $error) {
    echo "<h3>" . $error . "</h3>";
}
?>
<form action="index.php?ctl=insertarCita" method="post">
    <input type="text" name="usuario" hidden value="<?= $_SESSION['idUser'] ?>">
    <label for="cita_texto">Cita</label>
    <textarea name="cita_texto" placeholder="Escribe tu cita" id="cita_texto"></textarea>
    <label for="fuente">Fuente</label>
    <input type="text" name="cita_fuente" id="fuente">
    <label for="cita_tipo">Tipo</label>
    <select name="cita_tipo">
        <?php
            $tipos = new Citas();
            $lista = $tipos->listaTipos();
            foreach($lista as $tipo){
                echo "<option value='" . $tipo['tipo_id'] . "'>" . ucfirst($tipo['tipo_nombre']) . "</option>";
            }

        ?>  
    </select>
    <input type="submit" value="Enviar Cita" name="btnEnviarCita">
</form>
<?php $contenido = ob_get_clean(); ?>
<?php include 'layout.php'; ?>

