<div class="inside">
	<br>
	<h2>Actualizar informaci&oacute;n</h2>

	<?php
		echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('username', array('label' => 'Nombre de usuario'));
		echo $this->Form->input('bio');
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('lastname', array('label' => 'Apellido'));
		echo $this->Form->input('lastlastname', array('label' => 'Segundo Apellido'));
		echo $this->Form->input('email', array('label' => 'Correo'));
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('password', array('type' => 'hidden'));
		echo $this->Form->end('Actualizar');

		echo "<br><hr><br><h2>Fotos</h2><div id='button'><span>".$this->Html->link('Ver', array('controller' => 'photos', 'action' => 'index'))."</span></div>";
	?>
</div>