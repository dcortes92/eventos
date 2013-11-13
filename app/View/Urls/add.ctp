<h2>Add Product</h2>

<?php
        echo $this->Form->create();
        echo $this->Form->input('url');
		$this -> Session -> read("User")['User']['id'];
		$user_id =(int)$this;
		echo $this->Form->hidden('user_id', array('value'=> $user_id));
        echo $this->Form->end('Save');
?>