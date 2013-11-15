<div class="inside">

	<br>
	<h2>Hilos</h2>

	<table class='TableResult'>
		<tr>
			<th> T&iacute;tulo </th>
			<th colspan="2">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $events array, printing out post info -->

		<?php foreach ($threads as $thread): ?>
		<tr>
			<td>
				<?php echo $thread['Thread']['name']; ?>
			</td>
			<td>
				<?php echo $this->Html->link('Ver', array('action' => 'view', $thread['Thread']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table><br><br>
	
</div>		