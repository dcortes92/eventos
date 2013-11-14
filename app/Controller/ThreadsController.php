<?php
	class ThreadsController extends AppController {
		public function index() {
			$this->set('title_for_layout','Business Meeting - Hilos');
			$this ->layout='admin';
			$this->set('threads', $this->Thread->find('all'));
		}
		
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