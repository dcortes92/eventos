<h2>Login</h2>

<?php

	echo $this->Form->create('User');
	echo $this->Form->input('email', array('label' => 'Correo electr&oacute;nico'));
	echo $this->Form->input('password', array('label' => 'Contrase&ntilde;a'));
	echo $this->Form->end('Login');
?>