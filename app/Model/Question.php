<?php
	class Question extends AppModel {
		public $belongsTo = array(
           'Proposal'
        );
		public $validate = array(
			'question' => array('rule' => 'notEmpty')
		);
	}
?>