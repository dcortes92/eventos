<h2>Add Photo</h2>

<?php
        echo $this->Form->create();
		$this -> Session -> read("User")['User']['id'];
		$user_id =(int)$this;
		echo $this->Form->hidden('user_id', array('value'=> $user_id));
        echo $this->Form->input('photo');
        echo $this->Form->end('Save');
?>