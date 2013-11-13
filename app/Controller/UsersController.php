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
		$this->set('title_for_layout', 'Business Meeting - Registrar Usuario');
		if( $this->request->is('post') )
		{
			/*Saves the user info to the database, the model validates the input*/
			$this->User->save( $this->request->data );
			/*Redirects to the homepage*/
			$this->redirect('/'); 
		}
	}

	/*Public view for registering users*/
	public function register()
	{

		$this->set('title_for_layout', 'Business Meeting - Registrarse');
		if( $this->request->is('post'))
		{
			$this->User->save( $this->request->data );
			$this->Session->setFlash('Usuario registrado correctamente.', 'default', array('class' => 'success'));
			$this->redirect('/');
		}
	}

	public function login()
	{
		$this->set('title_for_layout', 'Business Meeting - Login');
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

				$type = intval($this->Session->read('User')['User']['user_type']);
				
				if($type == 1) //Admin
				{
					$this->redirect(array(
					'controller' => 'users',
					'action' => 'adminprofile'
					));
				}
				else if($type == 2) //Regular user
				{
					$this->redirect(array(
					'controller' => 'users',
					'action' => 'uprofile'
					));
				}
				else
				{
					$this->Session->setFlash('Error desconocido.');
				}
			}
			else
			{
				$this->Session->setFlash('Correo y/o contrase&ntilde;a incorrectos');
			}
		}
	}

	/*Destroys session*/
	public function logout()
	{
		$this->Session->destroy();
		$this->redirect(array('controller' => 'users', 'action' => 'login'));
	}

	/*Once the user has logged in, his menu is loaded*/
	public function uprofile()
	{
		$this->set('title_for_layout', 'Business Meeting - Perfil Usuario');
		$this->layout = 'user';
	}

	/*Edit de user*/
	public function edituser($id = null)
	{
		$this->set('title_for_layout', 'Business Meeting - Actualizar informacion');

		$temp = $this->Session->read('User');
		if(intval($temp['User']['user_type']) == 1)
			$this->layout = 'admin';
		else
			$this->layout = 'user';

		$this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario incorrecto'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
        	$this->request->data['User']['password'] = $temp['User']['password'];
        	//pr($this->request->data);
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Su información se ha actualizado', 'default', array('class' => 'success'));
            }
            else
            {
            	$this->Session->setFlash(__('No se ha podido actualizar su información. 
            	Por favor, inténtelo de nuevo.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
	}

	/*In case the user is an admin*/
	public function adminprofile()
	{
		$this->set('title_for_layout', 'Business Meeting - Perfil Administrador');
		$this->layout = 'admin';
	}

	public function editrol()
	{
		$this->set('title_for_layout', 'Business Meeting - Editar privilegios');
		$this->layout = 'admin';

		$users = $this->User->
			find('list', array('conditions' => array('User.id !=' => $this->Session->read('User')['User']['id'])));

		$this->set('users', $users);

        if ($this->request->is('post') || $this->request->is('put')) {
        	$this->User->id = $this->request->data['User']['user_id'];
        	if($this->User->saveField('user_type', $this->request->data['User']['rol'],
        		array('validate' => false, 'callbacks' => false)))
        	{
        		$this->Session->setFlash('Su información se ha actualizado', 'default', array('class' => 'success'));
        	}
        	else
        	{
        		$this->Session->setFlash(__('No se ha podido actualizar su información. 
            	Por favor, inténtelo de nuevo.'));
        	}
            /*if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Su información se ha actualizado', 'default', array('class' => 'success'));
            }
            else
            {
            	$this->Session->setFlash(__('No se ha podido actualizar su información. 
            	Por favor, inténtelo de nuevo.'));
            }*/
        }
	}

	/*Privacy*/
	/*Protect views that only a valid user can access*/
	public function beforeFilter() {
		parent::beforeFilter();
		/*Aquí se validaría lo que hace un administrador y un usuario normal*/
		if(!$this->Session->check('User'))
		{
			if($this->request->action == 'login')
			{
				
			}
			elseif ($this->request->action == 'register') {
				
			}
			else
			{
				$this->redirect(array(
				'controller' => 'users',
				'action' => 'login'
				));	
			}
		}

		/*if( $this->request->action != 'login' && !$this->Session->check('User') ){
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'login'
			));
		}*/
	}
}

?>