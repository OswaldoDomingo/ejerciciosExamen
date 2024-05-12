<?php
// citasController.php

include_once("../modelo/classCita.php");

$modeloCitas = new Cita();

// Obtener todas las citas
$arrayCitas = $modeloCitas->getCita();

// Ver las citas
include_once("../vistas/verCitas.php");
