<div class="inside">
<br>
<h2>Editar Comentarios</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('comment',array('label' => 'Comentario', 'rows'=>'3'));
echo $this->Form->end('Salvar');
?>
</div>