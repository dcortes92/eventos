<div class="inside">

	<br>
	<h2>Salones</h2>

	<table class='TableResult'>
		<tr>
			<th> T&iacute;tulo </th>
			<th colspan="2">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $events array, printing out post info -->

		<?php foreach ($halls as $hall): ?>
		<tr>
			<td>
				<?php echo $hall['Hall']['name']; ?>
			</td>
			<td>
				<?php echo $this->Html->link('Ver', array('action' => 'view', $hall['Hall']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table><br><br>
	
</div>		