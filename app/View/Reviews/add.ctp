<div class="inside">
<br>
<h2>Agregar calificacions</h2>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('review', array(
    		'options' => array('1' => '1 Estrella', '2' => '2 Estrellas', '3' => '3 Estrellas', '4' => '4 Estrellas', '5' => '5 Estrellas')));
	echo $this->Form->hidden('proposal_id',array('value' => $proposal_id));
	echo $this->Form->end('Crear');
?>
</div>