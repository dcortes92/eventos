<div class="inside">
<br>
<h2>Preguntas</h2>
<table class='TableResult'>
    <tr>
        <th>Pregunta</th>
        <th colspan="2">Acciones</th>
    </tr>

<!-- Here's where we loop through our $questions array, printing out post info -->

    <?php foreach ($questions as $question): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($question['Question']['question'], array('action' => 'view', $question['Question']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $question['Question']['id']),
                array('confirm' => '¿Esta seguro?'));
            ?>
		</td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $question['Question']['id'])); ?>
        </td>
		
    </tr>
    <?php endforeach; ?>

</table>
</div>