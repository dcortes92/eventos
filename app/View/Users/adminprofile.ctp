<br>
<h2>¡Bienvenido Admin <span><?php
	$temp = $this->Session->read('User');

	echo $this->Html->link($temp['User']['name']. " ". $temp['User']['lastname'], array('action' => 'edituser', $temp['User']['id']));

?>! </span></h2>

<?php
	echo "Unido el ". $temp['User']['created'];
?>