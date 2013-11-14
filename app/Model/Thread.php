<?php
	class Thread extends AppModel {
		public $hasMany = array(
            'Sesion'
        );
		public $belongsTo = array(
           'Event'
        );
		public $validate = array(
			'name' => array('rule' => 'notEmpty'),
			'description' => array('rule' => 'notEmpty')
		);
	}
?>