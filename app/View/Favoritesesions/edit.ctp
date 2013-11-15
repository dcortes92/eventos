<div class="inside">
<br>
<h2>Editar Sesion</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('sesion',array('label' => 'Sesion'));
echo $this->Form->end('Salvar');
?>