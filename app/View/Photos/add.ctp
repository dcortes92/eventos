<div class="inside">
<br>
<h2>Agregar Foto</h2>

<?php
        echo $this->Form->create(array('id' => 'UserLoginForm'));
		echo $this->Form->input('title',array('label' => 'Nombre'));
        echo $this->Form->input('photo',array('label' => 'Foto'));
		$this -> Session -> read("User")['User']['id'];
		$user_id =(int)$this;
		echo $this->Form->hidden('user_id', array('value'=> $user_id));
        echo $this->Form->end('Salvar');
?>