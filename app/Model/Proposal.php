<?php
	class Proposal extends AppModel {
		public $hasMany = array(
            'Sesion', 'Comment', 'Question'
        );
		public $belongsTo = array(
           'Event','User'
        );
		public $validate = array(
			'name' => array('rule' => 'notEmpty'),
			'description' => array('rule' => 'notEmpty')
		);
	}
?>