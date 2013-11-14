<?php
	class EventsController extends AppController {
		public function index() {
			$this->set('events', $this->Event->find('all'));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid event'));
			}
			$event = $this->Event->findById($id);
			if (!$event) {
				throw new NotFoundException(__('Invalid event'));
			}
			$this->set('event', $event);
		}
		
		public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar Envento');
			$this ->layout='admin';
			if ($this->request->is('post')) {
				$this->Event->create();
				if ($this->Event->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
		}

		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid event'));
			}

			$event = $this->Event->findById($id);
			if (!$event) {
				throw new NotFoundException(__('Invalid event'));
			}

			if ($this->request->is(array('event', 'put'))) {
				$this->Event->id = $id;
				if ($this->Event->save($this->request->data)) {
					$this->Session->setFlash(__('Your event has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your event.'));
			}

			if (!$this->request->data) {
				$this->request->data = $event;
			}
		}

		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Event->delete($id)) {
				$this->Session->setFlash(__('The event with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}

		/*Permisos de accesso*/
		public function beforeFilter()
		{
			parent::beforeFilter();
			if(!$this->Session->check('User')) //Si no ha iniciado sesión
			{
				$this->redirect(array(
				'controller' => 'users',
				'action' => 'login' //se restringe el acceso y se redirecciona a la págian de login
				));	
			}
			else //Usuario activo
			{
				$temp = $this->Session->read('User');
				if(intval($temp['User']['user_type']) == 2) // 2 = Usuario, 1 = Administrador
				{
					$this->Session->setFlash('No se ha encontrado la página solicitada.');
					$this->redirect(array('controller' => 'users',
					'action' => 'uprofile'));	
				}
			}
		}
	}
	
?>