<?php
	class Event extends AppModel {
		public $displayField = 'title';
		public $hasMany = array(
            'Thread','Proposal'
        );
		public $validate = array(
			'title' => array('rule' => 'notEmpty'),
			'description' => array('rule' => 'notEmpty')
		);
	}
?>