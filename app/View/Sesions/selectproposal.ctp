<div class="inside">
<br>
<h2>Seleccione una propuesta</h2>
<table class='TableResult'>
    <tr>
        <th>Nombre</th>
        <th colspan="2">Accion</th>
    </tr>
	
	
    <?php foreach ($proposals as $proposal): ?>
		<tr>
			<td>
				<?php echo $proposal['Proposal']['name'].'<br>'?>
			</td>
			<td>
				<?php echo $this->Html->link('Ver Propuesta', array(
					'controller' => 'proposals',
					'action' => 'view'
					, $proposal['Proposal']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link('Crear Sesión', array('action' => 'add', $proposal['Proposal']['id'])); ?>
			</td>
    </tr>
		
		
    <?php endforeach; ?>

</table>