<div class="inside">
	<h2>Login</h2>

	<?php

		echo $this->Form->create('User');
		echo $this->Form->input('email', array('label' => 'Correo electr&oacute;nico'));
		echo $this->Form->input('password', array('label' => 'Contrase&ntilde;a'));
		echo $this->Form->input('openid', array('label' => 'OpenID:'));
		echo $this->Form->end('Login');
		echo $this->Html->link('¿No tiene cuenta? Regístrese', array('controller' => 'users', 'action' => 'register'));
	?>

</div>