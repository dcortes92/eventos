<?php
	class HallsController extends AppController {
		//Pueden verlo solo administradores
		public function index() {
			$type = intval($this->Session->read('User')['User']['user_type']);	
			if($type == 1) //Admin
			{
				$this->set('title_for_layout','Business Meeting - Salones');
				$this ->layout='user';
				$this->set('halls', $this->Hall->find('all'));
			}
			else if($type==2){
				$this->redirect(array(
					'controller' => 'halls',
					'action' => 'indexnormal'
				));
			}
			
		}
		public function indexnormal() {
			$this->set('title_for_layout','Business Meeting - Salones');
			$this ->layout='user';
			$this->set('halls', $this->Hall->find('all'));
			
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Salon');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid hall'));
			}
			$hall = $this->Hall->findById($id);
			if (!$hall) {
				throw new NotFoundException(__('Invalid hall'));
			}
			$this->set('hall', $hall);
		}
		//Pueden verlo solo administradores
		 public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar Salon');
			$this ->layout='admin';
			if ($this->request->is('post')) {
				$this->Hall->create();
				if ($this->Hall->save($this->request->data)) {
					$this->Session->setFlash('El salon ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar salón');
			$this ->layout='admin';
			if (!$id) {
				throw new NotFoundException(__('Invalid hall'));
			}

			$hall = $this->Hall->findById($id);
			if (!$hall) {
				throw new NotFoundException(__('Invalid hall'));
			}

			if ($this->request->is(array('hall', 'put'))) {
				$this->Hall->id = $id;
				if ($this->Hall->save($this->request->data)) {
					$this->Session->setFlash('El salon ha sido actualizado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your hall.'));
			}

			if (!$this->request->data) {
				$this->request->data = $hall;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Hall->delete($id)) {
				$this->Session->setFlash('El salon ha sido borrado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>