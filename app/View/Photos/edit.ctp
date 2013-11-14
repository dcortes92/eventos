<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Photos</h1>
<?php
echo $this->Form->create('Photo');
echo $this->Form->input('title');
echo $this->Form->input('photo', array('rows' => '3'));
echo $this->Form->end('Save Photo');
?>