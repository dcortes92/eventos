<div class="inside">
<br>
<h2>Crear Salones</h2>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('name',array('label' => 'Nombre'));
	echo $this->Form->input('address',array('label' => 'Dirección','rows' => '3'));
	echo $this->Form->end('Crear');
?>
</br>
</div>