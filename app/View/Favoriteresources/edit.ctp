<div class="inside">
<br>
<h2>Editar Recurso</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('resource',array('label' => 'Recurso'));
echo $this->Form->end('Salvar');
?>