<?php
	class Review extends AppModel {
		public $belongsTo = array(
           'Proposal'
        );
		public $validate = array(
			'review' => array('rule' => 'notEmpty')
		);
	}
?>