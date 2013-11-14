<div class="inside">
<br>
<h2>Editar Salon</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('name',array('label' => 'Nombre'));
echo $this->Form->input('address', array('rows' => '3','label' => 'Dirección'));
echo $this->Form->end('Guardar');
?>
</div>