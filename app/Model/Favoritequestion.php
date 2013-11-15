<!--Model files are always singular
Handles creation, editing and deleting of data
-->

<?php

/*To use hashing, Security and Utility must be included*/
App::uses('Security', 'Utility');	

class Favoritequestion extends AppModel{
	/*The display field makes the name of the user visible instead of the id*/
	
	
    /*Asossiation with Users*/
	


	public $belongsTo = array(
		'Question','User'
	);
		
		

}

?>