<?php

class Product extends AppModel{

	public $displayField = 'name'; 


	/*Asossiation with Users*/
	/*public $belongsTo = array(
		'User'
	);*/

	public $hasMany = array('User');
}

?>