<?php
	class Speaker extends AppModel {
		public $belongsTo = array(
           'Proposal', 'User'
        );
	}
?>