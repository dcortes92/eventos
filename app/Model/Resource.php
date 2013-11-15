<?php
	class Resource extends AppModel {
		public $belongsTo = array(
           'Proposal','Favoriteresource'
        );
		public $validate = array(
			'resource' => array('rule' => 'notEmpty'),
		);
	}
?>