<div class="inside">

	<br>
	<h2>Propuestas</h2>

	<table class='TableResult'>
		<tr>
			<th> T&iacute;tulo </th>
			<th colspan="5">Acciones</th>
		</tr>

	<!-- Here's where we loop through our $events array, printing out post info -->

		<?php foreach ($proposals as $proposal): ?>
		<tr>
			<td>
				<?php echo $proposal['Proposal']['name']; ?>

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
			<td>
				<?php echo $this->Html->link('Calificar', array(
					'controller' => 'reviews',
					'action' => 'add'
					, $proposal['Proposal']['id'])); 
				?>

			</td>
		</tr>
		<?php endforeach; ?>
	</table><br><br>
	<?php 
		echo "<div id='button'>".$this->Html->link('Crear', array('controller' => 'proposals', 'action' => 'add'))."</div>"
	?>
</div>		