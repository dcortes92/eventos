<div class="inside">

	<br>
	<h2>Eventos</h2>

	<table class='TableResult'>
		<tr>
			<th>T&iacute;tulo</th>
			<th colspan="2">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $events array, printing out post info -->

		<?php foreach ($events as $event): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($event['Event']['title'], array('action' => 'view', $event['Event']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $event['Event']['id']),
					array('confirm' => 'Are you sure?'));
				?>
			</td>
			<td>
				<?php echo $this->Html->link('Edit', array('action' => 'edit', $event['Event']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table><br><br>
	
	<div id='button'><span><?php echo $this->Html->link('Crear', array('action' => 'add')); ?> </span></div>
</div>		