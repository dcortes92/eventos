<?php
	class Sesion extends AppModel {
		public $belongsTo = array(
           'Proposal', 'Hall','Thread'
        );
		public $validate = array(
			'date' => array('rule' => 'notEmpty'),
			'name' => array('rule' => 'notEmpty'),
			'description' => array('rule' => 'notEmpty')
		);
	}
?>