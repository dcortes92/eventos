<h2>¡Bienvenido Admin <span><?php
	$temp = $this->Session->read('User');

	echo $temp['User']['name']. " ". $temp['User']['lastname'];

?>! </span></h2>