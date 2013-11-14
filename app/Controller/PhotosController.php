<?php

	class PhotosController extends AppController{
		public function index() {
			$this->set('photos', $this->Photo->find('all'));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid photo'));
			}
			$photo = $this->Photo->findById($id);
			if (!$photo) {
				throw new NotFoundException(__('Invalid photo'));
			}
			$this->set('photo', $photo);
		}
		 public function add() {
			$users = $this->Photo->User->find('list'); //List return a numeric array with the ids
			if ($this->request->is('post')) {
				$this->Photo->create();
				if ($this->Photo->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			$this->set('users', $users);
		}
		public function edit($id = null) {
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
					$this->Session->setFlash(__('Your photo has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your photo.'));
			}

			if (!$this->request->data) {
				$this->request->data = $photo;
			}
		}
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Photo->delete($id)) {
				$this->Session->setFlash(__('The photo with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
}

?>