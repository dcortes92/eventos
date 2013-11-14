<?php

class Url extends AppModel{

        public $displayField = 'url'; 


        public $belongsTo = array(
                'User'
        );
		
		public $validate = array(
			'photo' => array('rule' => 'notEmpty')
		);
}

?>