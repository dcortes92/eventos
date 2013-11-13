<div class="inside">
	<h2>Registrarse</h2>

	<?php
		echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('lastname', array('label' => 'Apellido'));
		echo $this->Form->input('email', array('label' => 'Correo'));	
		echo $this->Form->input('username', array('label' => 'Nombre de usuario'));
		echo $this->Form->input('password', array('label' => 'Contrase&ntilde;a'));
		echo $this->Form->end('Registrar');
		echo $this->Html->link('¿Tiene usuario? Login', array('controller' => 'users', 'action' => 'login'));
	?>
</div>