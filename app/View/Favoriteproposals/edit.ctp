<div class="inside">
<br>
<h2>Editar Propuesta</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('proposal',array('label' => 'Propuesta'));
echo $this->Form->end('Salvar');
?>