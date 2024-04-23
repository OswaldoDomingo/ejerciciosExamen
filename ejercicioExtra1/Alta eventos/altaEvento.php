<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Alta de Evento - Club Deportivo</title>
</head>

<body>
    <?php   ?>
    <h2>Dar de Alta un Nuevo Evento - Club Deportivo</h2>

    <form action="procesar_alta_evento.php" method="post" enctype="multipart/form-data">
        <!-- Campo para el nombre del evento -->
        <label for="nombre_evento">Nombre del Evento:</label>
        <input type="text" id="nombre_evento" name="nombre_evento"><br>
        <?php
        // echo (!empty($errores)) ? $errores['nombre_evento'] : "";
        echo muestra_errores($errores, 'nombre_evento');
        ?>
        <br>
        <br>
        <!-- Campo para el tipo de evento -->
        <!-- <label for="tipo_evento">Tipo de Evento:</label>
    <select id="tipo_evento" name="tipo_evento" >
        <option value="competencia">Competencia</option>
        <option value="entrenamiento">Entrenamiento</option>
        <option value="torneo">Torneo</option>
        <option value="charla">Charla</option>
        <option value="otros">Otros</option>
    </select><br><br> -->
        <?php
        creaSelect($tipoEvento, 'tipo_evento', 'Tipo de Evento');
        ?>
        <br>
        <!-- Campo para la fecha del evento -->
        <label for="fecha_evento">Fecha del Evento:</label>
        <input type="date" id="fecha_evento" name="fecha_evento">
        <?php
        echo muestra_errores($errores, 'fecha_evento');
        // echo (!empty($errores)) ? $errores['fecha_evento'] : "";
        ?>
        <br>
        <br>

        <!-- Campo para la hora del evento -->
        <label for="hora_evento">Hora del Evento:</label>
        <input type="time" id="hora_evento" name="hora_evento">
        <?php
        echo muestra_errores($errores, 'hora_evento');
        // echo (!empty($errores)) ? $errores['hora_evento'] : "";
        ?>
        <br>
        <br>
        <!-- Campo para la ubicación del evento -->
        <label for="ubicacion">Ubicación del Evento:</label>
        <input type="text" id="ubicacion" name="ubicacion"><br><br>
        <?php
        echo muestra_errores($errores, 'ubicacion');
        ?>
        <!-- Campo para la descripción -->
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>
        <?php
        echo muestra_errores($errores, 'descripcion');
        ?>
        <!-- Campo para subir un archivo relacionado con el evento -->
        <label for="imagen">Subir imagen del evento (opcional):</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>
        <?php
        echo muestra_errores($errores, 'imagen');
        ?>
        <!-- Botón de enviar -->
        <input type="submit" name="submit" value="Dar de Alta">
    </form>

</body>

</html>