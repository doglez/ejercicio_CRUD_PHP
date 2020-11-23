<?php
// Recolecta de variables metodo POST
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
$autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
$disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;

// Llamado de la funcion para modificar el libro
$libro = ModificarLibro($codigo, $titulo, $autor, $disponible);

?>
<form method="POST">
    <p>
        <label for="titulo">Titulo</label>
        <input id="titulo" type="text" name="titulo" value="<?=$libro['titulo']; ?>">
    </p>
    <p>
        <label for="autor">Autor</label>
        <input id="autor" type="text" name="autor" value="<?=$libro['autor']; ?>">
    </p>
    <p>
        <div>Disponible</div>
        <input id="si-disponible" type="radio" name="disponible" value="1"<?=$libro['disponible'] ? 'checked' : ''; ?>>
        <label for="si-disponible">Si</label>
        <input id="no-disponible" type="radio" name="disponible" value="0"<?= !$libro['disponible'] ? 'checked' : ''; ?>>
        <label for="no-disponible">No</label>
    </p>
    <p>
        <input type="hidden" name="codigo" value="<?= $codigo; ?>">
        <input type="submit" value="Modificar">
    </p>
</form>