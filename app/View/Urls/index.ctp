<div class="inside">
<br>
<h2>Urls</h2>

<table class='TableResult'>
    <tr>
        <th>Titulo</th>
        <th colspan="2">Actions</th>
    </tr>

<!-- Here's where we loop through our $urls array, printing out post info -->

    <?php foreach ($urls as $url): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($url['Url']['title'], array('action' => 'view', $url['Url']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $url['Url']['id']),
                array('confirm' => '¿Esta Seguro?'));
            ?>
		</td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $url['Url']['id'])); ?>
       
		</td>
    </tr>
    <?php endforeach; ?>

</table>
<br>
<div id="button"><span><?php echo $this->Html->link('Guardar URL', array('action' => 'add')); ?></span></div>