<!-- File: /app/View/Posts/add.ctp -->
<h1>Add Threads</h1>
<?php
	echo $this->Form->create('Thread');
	echo $this->Form->input('name');
	echo $this->Form->input('event_id');
	echo $this->Form->input('description', array('rows' => '3'));
	echo $this->Form->end('Save Thread');
?>