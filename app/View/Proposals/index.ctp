<div class="inside">

	<br>
	<h2>Propuestas</h2>
</div>

	<table class='TableResult'>
		<tr>
			<th>Nombre</th>
			<th colspan="7">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $proposals array, printing out post info -->
		<?php foreach ($proposals as $proposal): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($proposal['Proposal']['name'], array('action' => 'view', $proposal['Proposal']['id'])); ?>

				<?php 
					$reviews = $proposal['Review'];
					$count = count($reviews);
					if ($count == 0) {
						$count = 1;
					}
					$acumulado = 0;
					foreach ($reviews as $review) {
						$acumulado = $acumulado + floatval($review['review']);
					}

					echo "<br><br>Calificación ".number_format($acumulado / $count, 2);
				?>
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
			<td>
				<?php echo $this->Html->link('Comentar', array(
					'controller' => 'comments',
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
			<td>
				<?php echo $this->Html->link('Calificar', array(
					'controller' => 'reviews',
					'action' => 'add'
					, $proposal['Proposal']['id'])); 
				?>

			</td>
			<td>
				<?php echo $this->Html->link('Agregar Ponente', array(
					'controller' => 'speakers',
					'action' => 'add'
					, $proposal['Proposal']['id'])); 
				?>

			</td>
			<td>
				<?php echo $this->Html->link('Eliminar Ponente', array(
					'controller' => 'speakers',
					'action' => 'delete'
					, $proposal['Proposal']['id'])); 
				?>

			</td>
		</tr>
		<?php endforeach; ?>

	</table>
<div class='inside'>
	<br>
	<br>
	<div id="button"> <span><?php echo $this->Html->link('Crear', array('action' => 'add')); ?></span></div>
	
</div>