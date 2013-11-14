<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Proposals</h1>
<?php
echo $this->Form->create('Proposal');
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end('Save Proposal');
?>