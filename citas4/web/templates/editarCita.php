<?php
ob_start();
$id_cita = recoge('id');
$cita = new Citas();
$cita_nueva = $cita->leeCita($id_cita);

if (!$cita_nueva) {
    echo "Cita no encontrada.";
    exit;
}
?>
<form method="post" action="index.php?ctl=actualizarCita">
    <input type="hidden" name="id" value="<?= htmlspecialchars($cita_nueva['citas_id'], ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="usuario" value="<?= htmlspecialchars($cita_nueva['citas_usuario'], ENT_QUOTES, 'UTF-8') ?>">
    <label for="texto">Texto:</label>
    <textarea id="texto" name="texto"><?= htmlspecialchars($cita_nueva['citas_texto'], ENT_QUOTES, 'UTF-8') ?></textarea><br>
    <label for="fuente">Fuente:</label>
    <input type="text" id="fuente" name="fuente" value="<?= htmlspecialchars($cita_nueva['citas_fuente'], ENT_QUOTES, 'UTF-8') ?>"><br>
    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo">
        <?php
            // $tipos = new Citas();
            $lista = $cita->listaTipos();
            foreach ($lista as $tipo) {
                $selected = ($tipo['tipo_id'] == $cita_nueva['citas_tipo']) ? 'selected' : '';
                echo "<option value='" . $tipo['tipo_id'] . "' $selected>" . ucfirst($tipo['tipo_nombre']) . "</option>";
            }
        ?>
    </select><br>

    <input type="submit" value="Actualizar" name="btnActualizar">
</form>

<?php
$contenido = ob_get_clean();
include 'layout.php';
?>