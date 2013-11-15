<?php
	class Resource extends AppModel {
		public $belongsTo = array(
           'Proposal'
        );
		public $validate = array(
			'resource' => array('rule' => 'notEmpty')
		);
	}
?>