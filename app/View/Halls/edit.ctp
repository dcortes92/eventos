<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Halls</h1>
<?php
echo $this->Form->create('Hall');
echo $this->Form->input('name');
echo $this->Form->input('address', array('rows' => '3'));
echo $this->Form->end('Save Hall');
?>