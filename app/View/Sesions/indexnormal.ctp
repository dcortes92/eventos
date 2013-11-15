<div class="inside">

	<br>
	<h2>Sesiones</h2>

	<table class='TableResult'>
		<tr>
			<th> T&iacute;tulo </th>
			<th colspan="2">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $events array, printing out post info -->

		<?php foreach ($sesions as $sesion): ?>
		<tr>
			<td>
				<?php echo $sesion['Sesion']['name']; ?>
			</td>
			<td>
				<?php echo $this->Html->link('Ver', array('action' => 'view', $sesion['Sesion']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table><br><br>
	
</div>		