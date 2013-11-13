<?php

App::uses('Security', 'Utility');

class UsersController extends AppController{
	public function index()
	{
		$users = $this->User->find('all'); //Get all the users and store them in a variable

		pr($users);

		$this->set('users', $users);
	}
	
	public function add()
	{
		$this->set('title_for_layout', 'Eventos - Registrar Usuario');
		if( $this->request->is('post') )
		{
			/*Saves the user info to the database, the model validates the input*/
			$this->User->save( $this->request->data );
			/*Redirects to the homepage*/
			$this->redirect('/'); 
		}
	}

	public function login()
	{
		if($this->request->is('post'))
		{
			//1. Find method: boring one
			/*$user = $this->User->find('first', array(
				'conditions' => array(
					'email' => $this->request->data('User.email'),
					'password' => $this->request->data('User.password')
				)
			));

			debug($user);*/

			//2. Magical Find
			$user = $this->User->findByEmailAndPassword( $this->request->data('User.email'), 
														 Security::hash($this->request->data('User.password'), 'sha1', true) );

			//debug($user);

			/*Create session*/
			if($user)
			{
				$this->Session->write('User', $user);
				$this->redirect(array(
					'controller' => 'users',
					'action' => 'uprofile'
				));
			}			

			$this->Session->setFlash('Correo y/o contrase&ntilde;a incorrectos');
		}
	}

	/*Destroys session*/
	public function logout()
	{
		$this->Session->destroy();
		$this->redirect(array('controller' => 'home', 'action' => 'index'));
	}

	/*Once the user has logged in, his menu is loaded*/
	public function uprofile()
	{
		$this->layout = 'user';		
	}

	/*Privacy*/
	/*Protect views that only a valid user can access*/
	public function beforeFilter() {
		parent::beforeFilter();

		if( $this->request->action != 'login' && !$this->Session->check('User') ){
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'login'
			));
		}
	}
}

?>