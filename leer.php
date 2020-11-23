<?php
// llamado de la funcion MostrarLibros y guardado en la variable resultado para poder mostrar la informacion de la db
$resultado = MostrarLibros();
?>
<p><a class="button" href="index.php?page=nuevo">Crear</a></p>
<table>
    <tr>
        <th>Codigo</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Disponible</th>
        <th colspan="2">Accion</th>        
    </tr>
    <?php foreach ($resultado as $key => $value): ?>
    <tr>
        <td><?= $value['codigo']; ?></td>
        <td><?= $value['titulo']; ?></td>
        <td><?= $value['autor']; ?></td>
        <td><?= $value['disponibilidad'] ? 'Si' : 'No';?></td>
        <td><a class="button" href="index.php?page=modificar&codigo=<?= $value['codigo'] ?>">Modificar</a></td>
        <td><a class="button" href="index.php?page=borrar&codigo=<?= $value['codigo'] ?>">Borrar</a></td>
    </tr>
    <?php endforeach; ?>
</table>
