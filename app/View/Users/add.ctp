<h2>Add a user</h2>

<?php
	echo $this->Form->create();
	echo $this->Form->input('firstname');
	echo $this->Form->input('lastname');
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->end('Save');
?>