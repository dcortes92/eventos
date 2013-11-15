<div class="inside">
<br>
<h2>Agregar Foto</h2>

<?php
        echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('title',array('label' => 'Nombre'));
        echo $this->Form->input('photo',array('label' => 'Foto'));
		$user_id= $this -> Session -> read("User")['User']['id'];
		echo $this->Form->hidden('user_id', array('value'=> $user_id));
        echo $this->Form->end('Salvar');
?>