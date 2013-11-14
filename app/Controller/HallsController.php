<?php
	class HallsController extends AppController {
		public function index() {
			$this->set('halls', $this->Hall->find('all'));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid hall'));
			}
			$hall = $this->Hall->findById($id);
			if (!$hall) {
				throw new NotFoundException(__('Invalid hall'));
			}
			$this->set('hall', $hall);
		}
		
		 public function add() {
			if ($this->request->is('post')) {
				$this->Hall->create();
				if ($this->Hall->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
		}
		public function edit($id = null) {
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
					$this->Session->setFlash(__('Your hall has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your hall.'));
			}

			if (!$this->request->data) {
				$this->request->data = $hall;
			}
		}
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Hall->delete($id)) {
				$this->Session->setFlash(__('The hall with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>