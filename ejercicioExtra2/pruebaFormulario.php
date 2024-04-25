<!-- Grupo de checkboxes -->
        <form action="pruebaEnvio.php">
        <label>Deportes que practica:</label><br>
        <input type="checkbox" id="futbol" name="deportes[]" value="futbol">
        <label for="futbol">Fútbol</label><br>
        <input type="checkbox" id="baloncesto" name="deportes[]" value="baloncesto">
        <label for="baloncesto">Baloncesto</label><br>
        <input type="checkbox" id="tenis" name="deportes[]" value="tenis">
        <label for="tenis">Tenis</label><br>
        
        <input type="submit" value="Envia" name="envia" >
        </form>