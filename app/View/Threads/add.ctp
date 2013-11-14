<div class="inside">
<br>
<h2>Agregar hilos</h2>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('name',array('label' => 'Nombre'));
	echo $this->Form->input('event_id',array('label' => 'Evento'));
	echo $this->Form->input('description', array('rows' => '3', 'label' => 'Descripción'));
	echo $this->Form->end('Crear');
?>
</div>