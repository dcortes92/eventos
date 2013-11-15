<div class="inside">
<br>
<h2>Agregar comentarios</h2>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('comment', array('rows' => '3', 'label' => 'Comentario'));
	echo $this->Form->hidden('proposal_id',array('value' => $proposal_id));
	$user_id= $this -> Session -> read("User")['User']['id'];
	echo $this->Form->hidden('user_id', array('value'=> $user_id));
	echo $this->Form->end('Crear');
?>
</div>