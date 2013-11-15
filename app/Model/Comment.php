<?php
	class Comment extends AppModel {
		public $belongsTo = array(
           'Proposal', 'User'
        );
		public $validate = array(
			'comment' => array('rule' => 'notEmpty')
		);
	}
?>