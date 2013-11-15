<div class="inside">

	<br>
	<h2>Propuestas</h2>

	<table class='TableResult'>
		<tr>
			<th> T&iacute;tulo </th>
			<th colspan="4">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $events array, printing out post info -->

		<?php foreach ($proposals as $proposal): ?>
		<tr>
			<td>
				<?php echo $proposal['Proposal']['name']; ?>
			</td>
			<td>
				<?php echo $this->Html->link('Ver', array('action' => 'view', $proposal['Proposal']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link('Comentar', array(
					'controller' => 'comments',
					'action' => 'add'
					, $proposal['Proposal']['id'])); 
				?>

			</td>
			<td>
				<?php echo $this->Html->link('Agregar Recurso', array(
					'controller' => 'resources',
					'action' => 'add'
					, $proposal['Proposal']['id'])); 
				?>

			</td>
			<td>
				<?php echo $this->Html->link('Agregar Pregunta', array(
					'controller' => 'questions',
					'action' => 'add'
					, $proposal['Proposal']['id'])); 
				?>

			</td>
		</tr>
		<?php endforeach; ?>
	</table><br><br>
	
</div>		