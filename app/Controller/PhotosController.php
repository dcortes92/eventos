<?php

	class PhotosController extends AppController{
		//Pueden verlo solo administradores
		public function index() {
			$user_id= $this -> Session -> read("User")['User']['id'];
			$photos = $this->Photo->find('all',array('conditions' => array('Photo.user_id' =>$user_id)));
			$this->set('title_for_layout','Business Meeting - Fotos');

			$this->set('title_for_layout','Business Meeting - Ver Foto');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';

			$this->set('photos', $photos);
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Foto');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			if (!$id) {
				throw new NotFoundException(__('Invalid photo'));
			}
			$photo = $this->Photo->findById($id);
			if (!$photo) {
				throw new NotFoundException(__('Invalid photo'));
			}
			$this->set('photo', $photo);
		}
		//Pueden verlo solo administradores y usuarios
		 public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			$users = $this->Photo->User->find('list'); //List return a numeric array with the ids
			if ($this->request->is('post')) {
				$this->Photo->create();

				$filename = 'files/'.$this->request->data['Photo']['photo']['name'];
				move_uploaded_file($this->request->data['Photo']['photo']['tmp_name'], $filename);
				$this->request->data['Photo']['photo'] = $filename;

				if ($this->Photo->save($this->request->data)) {
					$this->Session->setFlash('La foto ha sido creada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			$this->set('users', $users);
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar Foto');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			if (!$id) {
				throw new NotFoundException(__('Invalid photo'));
			}

			$photo = $this->Photo->findById($id);
			if (!$photo) {
				throw new NotFoundException(__('Invalid photo'));
			}

			if ($this->request->is(array('photo', 'put'))) {
				$this->Photo->id = $id;
				if ($this->Photo->save($this->request->data)) {
					$this->Session->setFlash('La foto ha sido actualizada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your photo.'));
			}

			if (!$this->request->data) {
				$this->request->data = $photo;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Photo->delete($id)) {
				$this->Session->setFlash('La foto ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}

	/*Privacy*/
	/*Protected views that only a valid user can access*/
	public function beforeFilter() {
		parent::beforeFilter();
		/*Aquí se validaría lo que hace un administrador y un usuario normal*/
		if(!$this->Session->check('User'))
		{
			$this->redirect(array(
			'controller' => 'users',
			'action' => 'login' //se restringe el acceso y se redirecciona a la págian de login
			));	
		}
		else //En caso de que haya sesión activa, restringir a los usuarios las tareas administrativas
		{
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 2) // 2 = Usuario, 1 = Administrador
			{
				if($this->request->action == 'delete')
				{
					$this->Session->setFlash('No se ha encontrado la página solicitada.');
					$this->redirect(array('controller' => 'users',
					'action' => 'uprofile'
					));	
				}
					
			}
		}
	}
}

?>