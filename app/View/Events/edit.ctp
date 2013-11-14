<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Events</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end('Save Event');
?>