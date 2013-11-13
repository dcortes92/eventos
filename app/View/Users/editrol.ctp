<br>
<div class="inside">
	<h2>Editar Roles de Usuario</h2>

	<?php
		echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('user_id', array(
			'label' => 'Lista de Usuarios'));
		echo $this->Form->input('rol', array(
    		'options' => array('1' => 'Administrador', '2' => 'Usuario')));
		echo $this->Form->end('Editar');
	?>
</div>