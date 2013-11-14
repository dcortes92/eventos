<?php
	class ThreadsController extends AppController {
		public function index() {
			$this->set('threads', $this->Thread->find('all'));
		}
		
		public function view($id = null) {
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
			
			$events = $this->Thread->Event->find('list');
			
			//$threads = $this->Thread->find('list');
			
			if ($this->request->is('post')) {
				$this->Thread->create();
				if ($this->Thread->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('threads', $threads);

            $this->set('events', $events);
		}
		public function edit($id = null) {
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
					$this->Session->setFlash(__('Your thread has been updated.'));
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
				$this->Session->setFlash(__('The thread with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>