<div class="inside">
<br>
<h2>Agregar Foto</h2>

<?php
        echo $this->Form->create(array('id' => 'UserLoginForm', 'enctype' => 'multipart/form-data'));
		echo $this->Form->input('title',array('label' => 'Nombre'));
        echo $this->Form->input('photo',array('type' => 'file','label' => 'Imagen'));
		$user_id= $this -> Session -> read("User")['User']['id'];
		echo $this->Form->hidden('user_id', array('value'=> $user_id));
        echo $this->Form->end('Salvar');
?>