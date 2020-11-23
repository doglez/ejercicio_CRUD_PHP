<?php
$resultado = ConfirmarBorrarLibro($codigo);
BorrarLibro($confirmar, $codigo);
?>

<h2>Favor confirmar que borrar el siguiente libro: </h2>
<table>
    <tr>
        <th>Codigo</th>
        <th>Titulo</th>
        <th>Autor</th>        
        <th colspan="2">Accion</th>        
    </tr>
    <?php foreach ($resultado as $key => $value): ?>
    <tr>
        <td><?= $value['codigo']; ?></td>
        <td><?= $value['titulo']; ?></td>
        <td><?= $value['autor']; ?></td>
        <td><a class="button alerta" href="index.php?page=borrar&codigo=<?= $value['codigo'] ?>&confirmar=1">Confirmar</a></td>
        <td><a class="button" href="index.php?page=leer">Cancelar</a></td>
    </tr>
    <?php endforeach; ?>
</table>