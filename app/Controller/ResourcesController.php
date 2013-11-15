<?php
	class ResourcesController extends AppController {
		//Pueden verlo administradores y usuarios
		public function index() {
			$this->set('title_for_layout','Business Meeting - Recursos');
			$this ->layout='user';
			$user_id= $this -> Session -> read("User")['User']['id'];
			$resources = $this->Resource->find('all',array('conditions' => array('Resource.user_id' =>$user_id)));
			$this->set('resources', $resources);
		}
		//Solo puede acceder el administrador muestra todos los recursos
		public function indexadmin() {
			$this->set('title_for_layout','Business Meeting - Recurso');
			$this ->layout='admin';
			$this->set('resources', $this->Resource->find('all'));
			
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Recurso');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			if (!$id) {
				throw new NotFoundException(__('Invalid resource'));
			}
			$resource = $this->Resource->findById($id);
			if (!$resource) {
				throw new NotFoundException(__('Invalid resource'));
			}
			$this->set('resource', $resource);
		}
		//Pueden verlo todos los usuarios, se accede desde propuestas
		 public function add($id=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Recurso');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			
			//$resources = $this->Resource->find('list');
			
			if ($this->request->is('post')) {
				$this->Resource->create();
				if ($this->Resource->save($this->request->data)) {
					$this->Session->setFlash('El recurso ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'view', 'controller' => 'proposals', $id));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('resources', $resources);
			$this->set('proposal_id',$id);
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar Recurso');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			if (!$id) {
				throw new NotFoundException(__('Invalid resource'));
			}

			$resource = $this->Resource->findById($id);
			if (!$resource) {
				throw new NotFoundException(__('Invalid resource'));
			}

			if ($this->request->is(array('resource', 'put'))) {
				$this->Resource->id = $id;
				if ($this->Resource->save($this->request->data)) {
					$this->Session->setFlash('El recurso ha sido editado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your resource.'));
			}

			if (!$this->request->data) {
				$this->request->data = $resource;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Resource->delete($id)) {
				$this->Session->setFlash('El recurso ha sido borrado.','default',array('class' => 'success'));
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