<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CookiesController extends AppController {

/**
* Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

    //include the CookieComponent
    public $components = array('Cookie');

    public function beforeFilter() {
        parent::beforeFilter();
        //cookie setings   
        $this->Cookie->name = 'cookie_test';
        $this->Cookie->time = 3600;  // or '1 hour'
        $this->Cookie->path = '/';
        $this->Cookie->domain = 'runnable.com';
        $this->Cookie->secure = false;
        $this->Cookie->key = '39lbkutg1i2l0kta6785d8qki5';
        $this->Cookie->httpOnly = true;
    }

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
    public function display() {
       
        //write data to cookie: first parameter is variable name, second is value to be stored
        $this->Cookie->write('name', 'Harold');
        //to group variables use dot notation
        $this->Cookie->write('User.name', 'Harold');
        $this->Cookie->write('User.email', 'harold@example.com');
        //to set several variables at a time, just pass an array
        $this->Cookie->write('User', array('name' => 'Harold', 'email' => 'harold@example.com'));

        //to store value as plain-text(it is encrypted by default) set third parameter to false,
        //in fourth parameter set cookie expiration time(in seconds) 
        $this->Cookie->write('name', 'Harold', false, 3600);


        //read cookie value and send it to view
        $this->set("cookieName", $this->Cookie->read('User.name'));

        //delete cookie variable
        $this->Cookie->delete('User.email');

        //destroy current cookie
        $this->Cookie->destroy();
		
		
        $this->render('home');
    }
}