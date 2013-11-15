<div class="inside">
<br>
<h2>Editar Pregunta</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('question',array('label' => 'Pregunta'));
echo $this->Form->end('Salvar');
?>