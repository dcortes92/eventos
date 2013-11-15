<div class="inside">
<br>
<h2>Eliminar Ponentes</h2>
<?php
	foreach($speakers as $speaker){
		echo $this->Html->link($speaker['User']['username'], array(
			'controller' => 'speakers',
			'action' => 'deletedos',
			$proposal_id,$speaker['User']['id'])); 
	}
	
?>
</div>