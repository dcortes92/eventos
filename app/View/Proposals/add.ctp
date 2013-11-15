<div class="inside">
<br>
<h2>Crear Propuestas</h2>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('name',array('label' => 'Nombre'));
	echo $this->Form->input('event_id',array('label' => 'Evento'));
	echo $this->Form->hidden('user_id',array('value'=> $user_id));
	echo $this->Form->input('description', array('rows' => '3','label' => 'Descripcion'));
	echo $this->Form->end('Salvar');
?>
</div>