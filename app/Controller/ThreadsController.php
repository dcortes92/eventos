<?php
	class ThreadsController extends AppController {
		//Pueden verlo solo administradores
		public function index() {
			$type = intval($this->Session->read('User')['User']['user_type']);	
			if($type == 1) //Admin
			{
				$this->set('title_for_layout','Business Meeting - Hilos');
				$this ->layout='admin';
				$this->set('threads', $this->Thread->find('all'));
			}
			else if($type==2){
				$this->redirect(array(
					'controller' => 'threads',
					'action' => 'indexnormal'
				));
			}
			
		}
		public function indexnormal() {
			$this->set('title_for_layout','Business Meeting - Hilos');
			$this ->layout='admin';
			$this->set('threads', $this->Thread->find('all'));
			
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Hilo');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid thread'));
			}
			$thread = $this->Thread->findById($id);
			if (!$thread) {
				throw new NotFoundException(__('Invalid thread'));
			}
			$this->set('thread', $thread);
		}
		//Pueden verlo solo administradores
		 public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar Hilos');
			$this ->layout='admin';
			$events = $this->Thread->Event->find('list');
			
			//$threads = $this->Thread->find('list');
			
			if ($this->request->is('post')) {
				$this->Thread->create();
				if ($this->Thread->save($this->request->data)) {
					$this->Session->setFlash('El hilo ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('threads', $threads);

            $this->set('events', $events);
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar Hilos');
			$this ->layout='admin';
			if (!$id) {
				throw new NotFoundException(__('Invalid thread'));
			}

			$thread = $this->Thread->findById($id);
			if (!$thread) {
				throw new NotFoundException(__('Invalid thread'));
			}

			if ($this->request->is(array('thread', 'put'))) {
				$this->Thread->id = $id;
				if ($this->Thread->save($this->request->data)) {
					$this->Session->setFlash('El hilo ha sido editado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your thread.'));
			}

			if (!$this->request->data) {
				$this->request->data = $thread;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Thread->delete($id)) {
				$this->Session->setFlash('El hilo ha sido borrado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>