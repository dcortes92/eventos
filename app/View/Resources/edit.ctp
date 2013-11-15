<div class="inside">
<br>
<h2>Editar Recursos</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('link',array('label' => 'Recurso', 'rows'=>'3'));
echo $this->Form->end('Salvar');
?>
</div>