<?php

function conexion(){
$usuario= "root";
$password= "";
$servidor= "localhost";
$base_datos= "login";
$tabla= "usuarios";

$dns = "mysql:host=$servidor; dbname=$base_datos; charset=utf8";

/**$dns: Esta es una variable que estamos creando para almacenar la cadena de conexión a la base de datos. Aquí es donde almacenaremos toda la información necesaria para establecer la conexión.
mysql:host=$servidor: Esta parte indica el tipo de base de datos a la que nos estamos conectando y la ubicación del servidor. En este caso, estamos usando MySQL como el tipo de base de datos, y $servidor es una variable que debería contener la dirección del servidor MySQL al que nos conectaremos.
dbname=$base_datos: Aquí especificamos el nombre de la base de datos a la que queremos conectarnos. $base_datos es una variable que contiene el nombre de la base de datos que deseamos utilizar.
charset=utf8: Finalmente, esto establece el conjunto de caracteres que queremos usar para la conexión. En este caso, estamos especificando que queremos usar UTF-8, que es un conjunto de caracteres ampliamente utilizado y es compatible con una amplia gama de caracteres internacionales.
 */
try{
    $conexion = new PDO($dns, $usuario, $password);
    //establecer el modo error de PDO Exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Establecer el juego de caracteres UTF8
    $conexion->exec("SET CHARACTER SET utf8");
    //echo "Conexión exitosa";
    return $conexion;

} catch (PDOException $e){
    echo "Error en la conexión: ".$e->getMessage();
}
}