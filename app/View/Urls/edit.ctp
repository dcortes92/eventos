<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Urls</h1>
<?php
echo $this->Form->create('Url');
echo $this->Form->input('title');
echo $this->Form->input('photo', array('rows' => '3'));
echo $this->Form->end('Save Url');
?>