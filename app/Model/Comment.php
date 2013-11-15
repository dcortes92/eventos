<?php
	class Comment extends AppModel {
		public $hasMany = array(
            'Favoritecomment'
        );
		public $belongsTo = array(
           'Proposal', 'User'
        );
		public $validate = array(
			'comment' => array('rule' => 'notEmpty')
		);
	}
?>