<?php

if (isset($_GET["borrar"])) {
    setcookie("fondo_color", "silver", time() - 1);
    setcookie("nombre", "silver", time() - 1);
}
header('Location: index.php');