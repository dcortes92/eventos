<div class="inside">
<br>
<h2>Recursos</h2>
<table class='TableResult'>
    <tr>
        <th>Recurso</th>
        <th colspan="2">Acciones</th>
    </tr>

<!-- Here's where we loop through our $resources array, printing out post info -->

    <?php foreach ($resources as $resource): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($resource['Resource']['link'], array('action' => 'view', $resource['Resource']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $resource['Resource']['id']),
                array('confirm' => '¿Esta seguro?'));
            ?>
		</td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $resource['Resource']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
</div>