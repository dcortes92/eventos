<div class="inside">
<br>
<h2>Editar foto</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('title',array('label' => 'Titulo'));
echo $this->Form->end('Salvar');
?>