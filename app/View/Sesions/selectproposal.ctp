<div class="inside">
<br>
<h2>Seleccione una propuesta</h2>

	
	
    <?php foreach ($proposals as $proposal): ?>
		
        <?php echo  $this->Html->link($proposal['Proposal']['name'], array('action' => 'add', $proposal['Proposal']['id'])).'<br>'?>
		
    <?php endforeach; ?>

</br>