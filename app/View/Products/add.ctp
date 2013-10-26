<h2>Add Product</h2>

<?php
	echo $this->Form->create();
	echo $this->Form->input('user_id');
	echo $this->Form->input('name');
	echo $this->Form->end('Save');
?>