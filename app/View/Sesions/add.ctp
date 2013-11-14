<!-- File: /app/View/Posts/add.ctp -->
<h1>Add Sesions</h1>
<?php
	echo $this->Form->create('Sesion');
	echo $this->Form->input('name');
	echo $this->Form->input('date');
	echo $this->Form->input('description', array('rows' => '3'));
	echo $this->Form->hidden('proposal_id', array('value'=> $proposal_id));
	
	echo $this->Form->input('thread_id');
	echo $this->Form->input('hall_id');
	echo $this->Form->end('Save Sesion');
?>