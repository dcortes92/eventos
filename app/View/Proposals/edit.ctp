<div class="inside">
<br>
<h2>Editar Propuestas</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('name',array('label' => 'Nombre'));
echo $this->Form->input('description', array('rows' => '3','label' => 'Descripcion'));
echo $this->Form->end('Guardar');
?>
</div>