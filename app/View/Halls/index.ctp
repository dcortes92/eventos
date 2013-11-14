<div class="inside">
<br>
	<h2>Salones</h2>
	
	<table class='TableResult'>
		<tr>
			<th>Nombre</th>
			<th colspan="2">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $halls array, printing out post info -->

		<?php foreach ($halls as $hall): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($hall['Hall']['name'], array('action' => 'view', $hall['Hall']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Form->postLink(
					'Borrar',
					array('action' => 'delete', $hall['Hall']['id']),
					array('confirm' => '¿Esta seguro?'));
				?>
			</td>
			<td>
				<?php echo $this->Html->link('Editar', array('action' => 'edit', $hall['Hall']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>

	</table>
	<br>
	<br>
	<label id="button">
		<span><?php echo $this->Html->link('Agregar', array('action' => 'add')); ?></span>
	</label>
</div>