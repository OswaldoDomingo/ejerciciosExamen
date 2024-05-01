# Conexión a base de datos desde PHP
Para la conexión PDO

- Crear el script para acceso a base de datos tipo mysql 
```sql
        $dns = "mysql:host=$servidor; dbname=$base_dstos;charset=utf8";
```
- Crear el objeto al que llamaremos $conexion

```sql
        $conexion = new PDO($dns, $usuario, $password);
```
- Configurar el manejo de errores
 
```sql 
        $conexion->satAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```
- Configurar el juego de caracteres
```sql
        $conexion->exec("SET CHARACTER SET utf8");
```
- Devolver el objeto ``$conexion``
```sql
      return $conexion;
```
- Controlar las excepciones con ``catch``
```sql
        catch(PDOException $e){
            echo "Error en la conexión: $e->getMessage();
        }
```
- Función para conectar

```php
function conexion()
{
    $usuario = "pruebas";
    $base_datos = "pruebas";
    $password = "pruebas";
    $servidor = "localhost";

    $dns = "mysql:host=$servidor;dbname=$base_datos;charset=utf8";

    try {
        $conexion = new PDO($dns, $usuario, $password);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conexion->exec("SET CHARACTER SET utf8");

        return $conexion;
    } catch(PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
        return null; // Retorna null en caso de error
    }
}

echo conexion() ? "Conectado" : "No conectado";
```

