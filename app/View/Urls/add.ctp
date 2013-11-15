<div class="inside">
<br>
<h2>Guardar URLs</h2>

<?php
        echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('title',array('label' => 'Titulo'));
        echo $this->Form->input('url',array('label' => 'Url'));
		$user_id= $this -> Session -> read("User")['User']['id'];
		echo $this->Form->hidden('user_id', array('value'=> $user_id));
        echo $this->Form->end('Guardar');
?>