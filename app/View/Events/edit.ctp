<div class="inside">
	<br>
	<h2>Editar eventos</h2>
	<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('title',array('label' => 'Título'));
	echo $this->Form->input('description', array('rows' => '3','label' => 'Descripción'));
	echo $this->Form->end('Guardar');
	?>
</div>