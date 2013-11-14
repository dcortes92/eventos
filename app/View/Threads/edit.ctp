<div class="inside">
<br>
<h2>Editar Hilos</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('name',array('label' => 'Nombre'));
echo $this->Form->input('description', array('rows' => '3','label' => 'Descripción'));
echo $this->Form->end('Save Thread');
?>
</div>