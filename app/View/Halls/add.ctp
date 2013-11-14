<!-- File: /app/View/Posts/add.ctp -->
<h1>Add Halls</h1>
<?php
	echo $this->Form->create('Hall');
	echo $this->Form->input('name');
	echo $this->Form->input('address');
	echo $this->Form->end('Save Hall');
?>