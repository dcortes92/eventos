<?php

class Product extends AppModel{
	/*Asossiation with Users*/
	public $belongsTo = array(
		'User'
	);
}

?>