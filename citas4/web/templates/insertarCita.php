<?php ob_start(); ?>
<h2>INSERTAR CITAS</h2>
<?php
if (isset($params['mensaje'])) {
    echo "<h3>" . $params['mensaje'] . "</h3>";
}
?>
<?php
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
        <option value="1">Privada</option>
        <option value="2">Pública</option>
    </select>
    <input type="submit" value="Enviar Cita" name="btnEnviarCita">
</form>
<?php $contenido = ob_get_clean(); ?>
<?php include 'layout.php'; ?>

