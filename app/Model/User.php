<!--Model files are always singular
Handles creation, editing and deleting of data
-->

<?php

/*To use hashing, Security and Utility must be included*/
App::uses('Security', 'Utility');

class User extends AppModel{
	/*The display field makes the name of the user visible instead of the id*/
	public $displayField = 'lastname'; /*shows the firstname only, if you whant 
				first + last name search for virtualfield*/

	/*Asossiation with Products*/
	public $hasMany = array(
		'Product'
	);

	public $validate = array(
		'firstname' => array(
				'rule' => 'notEmpty',
				'message' => 'Please fill in the first name'
		),
		'lastname' => array(
				'rule' => 'notEmpty',
				'message' => 'Please fill in the last name'
		),
		'email' => array(
				'rule' => 'email',
				'message' => 'Please fill a valid email address'
		),
		'password' => array(
				'rule' => array('between', 5, 10),
				'message' => 'password must be between 5 and 10 characters long'
		)
	);

	/*Callback function to hash the password of the user, called before saving the form data
	  to the database*/
	public function beforeSave( $options = array() )
	{
		/*Last parameter is to determine wether to use or not to use salt, salt is an extra piece of data
		  that is appended to the string*/
		$this->data['User']['password'] = Security::hash( $this->data['User']['password'], 'sha1', true );

		return true; //Always necessary
	}
}

?>