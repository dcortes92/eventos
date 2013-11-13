<div class="inside">
	<br>
	<h2>Actualizar informaci&oacute;n</h2>

	<?php
		echo $this->Form->create();
		echo $this->Form->input('username', array('label' => 'Nombre de usuario'));
		echo $this->Form->input('bio');
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('lastname', array('label' => 'Apellido'));
		echo $this->Form->input('lastlastname', array('label' => 'Segundo Apellido'));
		echo $this->Form->input('email', array('label' => 'Correo'));
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('password', array('label' => 'Contraseña'));
		echo $this->Form->end('Actualizar');
	?>
</div>