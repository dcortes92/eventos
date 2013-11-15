<div class="inside">
<br>
<h2>Comentarios</h2>
<table class='TableResult'>
    <tr>
        <th>Comentario</th>
        <th colspan="4">Acciones</th>
    </tr>

<!-- Here's where we loop through our $comments array, printing out post info -->

    <?php foreach ($comments as $comment): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($comment['Comment']['comment'], array('action' => 'view', $comment['Comment']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $comment['Comment']['id']),
                array('confirm' => '¿Esta seguro?'));
            ?>
		</td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $comment['Comment']['id'])); ?>
        </td>
		<td>
            <?php echo $this->Html->link('Me gusta', array('action' => 'add', 'controller' => 'favoritecomments', $comment['Comment']['id'])); ?>
        </td>
		<td>
            <?php echo $this->Html->link('Ya no me gusta', array('action' => 'delete', 'controller' => 'favoritecomments', $comment['Comment']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
</div>