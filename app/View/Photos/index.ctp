<div class="inside">
<br>
<h2>Fotos</h2>

<table class='TableResult'>
    <tr>
        <th>Titulo</th>
        <th colspan="2">Actions</th>
    </tr>

<!-- Here's where we loop through our $photos array, printing out post info -->

    <?php foreach ($photos as $photo): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($photo['Photo']['title'], array('action' => 'view', $photo['Photo']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $photo['Photo']['id']),
                array('confirm' => 'Esta seguro?'));
            ?>
		</td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $photo['Photo']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
<br>
<div id="button"><span><?php echo $this->Html->link('Crear Foto', array('action' => 'add')); ?></p></div>
</div>