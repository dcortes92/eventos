<h2>¡Bienvenido <span><?php
	$temp = $this->Session->read('User');

	echo $temp['User']['name']. " ". $temp['User']['lastname'];

?>! </span></h2>