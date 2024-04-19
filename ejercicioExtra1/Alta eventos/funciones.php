<?php

//recoger el array, el nombre del select y el titulo
function creaSelect($array, $nombre, $titulo){
    echo "<label for='$nombre'>$titulo:</label>
    <select id='$nombre' name='$nombre' >";
    foreach($array as $valor){
        echo "<option value='$valor'>" . ucfirst($valor) . "</option>";
    }
    echo "</select><br><br>";
}



?>