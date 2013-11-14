<div class="inside">
	<br>
	<h2>Agregar Eventos</h2>
	<?php
		echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('title',array('label' => 'Titulo'));
		echo $this->Form->input('description', array('rows' => '3',label' => 'Descripcion'));
		echo $this->Form->end('Save Event');
	?>
</br>