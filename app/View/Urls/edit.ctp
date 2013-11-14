<div class="inside">
<br>
<h2>Editar Urls</h2>
<?php
echo $this->Form->create(array('id' => 'UserLoginForm'));
echo $this->Form->input('title',array('label' => 'Titulo'));
echo $this->Form->input('url', array('rows' => '3','label' => 'URL'));
echo $this->Form->end('Modificar');
?>
</div>