<?php

class Url extends AppModel{

        public $displayField = 'url'; 


        public $belongsTo = array(
                'User'
        );
}

?>