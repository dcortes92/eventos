<div class="inside">
	<br>
<h2>Crear Sesion</h2>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('name',array('label' => 'Nombre'));
	echo $this->Form->input('date',array('label' => 'Fecha'));
	echo $this->Form->input('description', array('rows' => '3','label' => 'Descripción'));
	echo $this->Form->hidden('proposal_id', array('value'=> $proposal_id));
	
	echo $this->Form->input('thread_id',array('label' => 'Hilo'));
	echo $this->Form->input('hall_id',array('label' => 'Salon'));
	echo $this->Form->end('Crear');
?>
</div>