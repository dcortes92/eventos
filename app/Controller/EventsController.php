<?php
	class EventsController extends AppController {
		//Pueden verlo solo administradores
		public function index() {
			$type = intval($this->Session->read('User')['User']['user_type']);	
			if($type == 1) //Admin
			{
				$this->set('title_for_layout','Business Meeting - Eventos');
				$this ->layout='admin';
				$this->set('events', $this->Event->find('all'));
			}
			else if($type==2){
				$this->redirect(array(
					'controller' => 'events',
					'action' => 'indexnormal'
				));
			}
			
		}
		public function indexnormal() {
			$this->set('title_for_layout','Business Meeting - Eventos');
			$this ->layout='admin';
			$this->set('events', $this->Event->find('all'));
			
		}
		//Pueden verlo  administradores y  usuarios
		public function view($id = null) {
			
			$this->set('title_for_layout','Business Meeting - Informamación evento');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			if (!$id) {
				throw new NotFoundException(__('Invalid event'));
			}
			$event = $this->Event->findById($id);
			if (!$event) {
				throw new NotFoundException(__('Invalid event'));
			}
			$this->set('event', $event);
		}
		//Pueden verlo  solo administradores
		 public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar Envento');
			$this ->layout='admin';
			if ($this->request->is('post')) {
				$this->Event->create();
				if ($this->Event->save($this->request->data)) {
					pr($this->request->data);
					$this->Session->setFlash('Su evento ha sido creado.','default',array('class' => 'success'));
					//return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar evento');
			$this ->layout='user';
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
					
					$this->Session->setFlash('Su evento ha sido actualizado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your event.'));
			}

			if (!$this->request->data) {
				$this->request->data = $event;
			}
		}
		//Pueden verlo  solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Event->delete($id)) {
				$this->Session->setFlash('Su evento ha sido borrado.','default',array('class' => 'success'));
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
					if($this->request->action == 'add')
					{
						$this->Session->setFlash('No se ha encontrado la página solicitada.');
						$this->redirect(array('controller' => 'users',
						'action' => 'uprofile'
						));	
					}
					if($this->request->action == 'edit')
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