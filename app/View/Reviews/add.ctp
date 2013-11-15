<div class="inside">
<br>
<h2>Agregar calificacions</h2>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('review', array('label' => 'Calificacion', 'row'=>'1'));
	echo $this->Form->hidden('proposal_id',array('value' => $proposal_id));
	echo $this->Form->end('Crear');
?>
</div>