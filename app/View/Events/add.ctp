<div class="inside">
	<br>
	<h2>Agregar Eventos</h2>
	<?php
		echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('title');
		echo $this->Form->input('description', array('rows' => '3'));
		echo $this->Form->end('Save Event');
	?>
</br>