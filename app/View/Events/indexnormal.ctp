<div class="inside">

	<br>
	<h2>Eventos</h2>

	<table class='TableResult'>
		<tr>
			<th> T&iacute;tulo </th>
			<th colspan="2">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $events array, printing out post info -->

		<?php foreach ($events as $event): ?>
		<tr>
			<td>
				<?php echo $event['Event']['title']; ?>
			</td>
			<td>
				<?php echo $this->Html->link('Ver', array('action' => 'view', $event['Event']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table><br><br>
	
</div>		