<div class="inside">
<br>
<h2>Sesiones</h2>

<table class='TableResult'>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th colspan="2">Actions</th>
    </tr>

<!-- Here's where we loop through our $sesions array, printing out post info -->

    <?php foreach ($sesions as $sesion): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($sesion['Sesion']['name'], array('action' => 'view', $sesion['Sesion']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $sesion['Sesion']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
		</td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $sesion['Sesion']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
<br>
<div id="button"><span><?php echo $this->Html->link('Crear', array('action' => 'add')); ?></span></div>
</div>