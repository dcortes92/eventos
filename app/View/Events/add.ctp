<!-- File: /app/View/Posts/add.ctp -->
<h1>Add Events</h1>
<?php
	echo $this->Form->create(array('id' => 'UserLoginForm'));
	echo $this->Form->input('title');
	echo $this->Form->input('description', array('rows' => '3'));
	echo $this->Form->end('Save Event');
?>