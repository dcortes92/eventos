<div class="inside">

	<br>
	<h2>Propuestas</h2>
	
	<table class='TableResult'>
		<tr>
			<th>Nombre</th>
			<th colspan="2">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $proposals array, printing out post info -->

		<?php foreach ($proposals as $proposal): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($proposal['Proposal']['name'], array('action' => 'view', $proposal['Proposal']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Form->postLink(
					'Borrar',
					array('action' => 'delete', $proposal['Proposal']['id']),
					array('confirm' => '¿Esta seguro?'));
				?>
			</td>
			<td>
				<?php echo $this->Html->link('Editar', array('action' => 'edit', $proposal['Proposal']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>

	</table>
	<br>
	<br>
	<div id="button"> <span><?php echo $this->Html->link('Crear', array('action' => 'add')); ?></span></div>
	
</div>