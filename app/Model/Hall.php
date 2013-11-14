<?php
	class Hall extends AppModel {
		public $displayField = 'name';
		public $hasMany = array(
            'Sesion'
        );
		public $validate = array(
			'name' => array('rule' => 'notEmpty'),
			'address' => array('rule' => 'notEmpty')
		);
	}
?>