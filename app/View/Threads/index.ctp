<div class="inside">
<br>
<h2>Hilos</h2>
<table class='TableResult'>
    <tr>
        <th>Name</th>
        <th colspan="2">Actions</th>
    </tr>

<!-- Here's where we loop through our $threads array, printing out post info -->

    <?php foreach ($threads as $thread): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($thread['Thread']['name'], array('action' => 'view', $thread['Thread']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $thread['Thread']['id']),
                array('confirm' => '¿Esta seguro?'));
            ?>
		</td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $thread['Thread']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
</div>
<br>
<div id="button">
<span><?php echo $this->Html->link('Crear', array('action' => 'add')); ?></span>
</div>