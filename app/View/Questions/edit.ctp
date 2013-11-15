<div class="inside">
<br>
<h2>Editar Preguntas</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('question',array('label' => 'Pregunta', 'rows'=>'3'));
echo $this->Form->end('Salvar');
?>
</div>