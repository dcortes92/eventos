<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Threads</h1>
<?php
echo $this->Form->create('Thread');
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end('Save Thread');
?>