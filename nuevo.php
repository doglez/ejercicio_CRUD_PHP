<?php
// llamado de la funcion NuevoLibro para poder cargar un nuevo libro en la db
NuevoLibro($titulo, $autor, $disponible);
?>

<form method="POST">
    <p>
        <label for="titulo">Titulo</label>
        <input id="titulo" type="text" name="titulo">
    </p>
    <p>
        <label for="autor">Autor</label>
        <input id="autor" type="text" name="autor">
    </p>
    <p>
        <div>Disponibilidad</div>
        <input id="si-disponible" type="radio" name="disponible" value="1" checked>
        <label for="si-disponible">Si</label>
        <input id="no-disponible" type="radio" name="disponible" value="0" checked>
        <label for="no-disponible">No</label>
    </p>
    <p>
        <input type="submit" value="Guardar">
    </p>
</form>