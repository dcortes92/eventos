<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Sessions</h1>
<?php
	echo $this->Form->create('Sesion');
	echo $this->Form->input('name');
	echo $this->Form->input('date');
	echo $this->Form->input('description', array('rows' => '3'));
	echo $this->Form->end('Save Proposal');
?>