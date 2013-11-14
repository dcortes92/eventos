<?php

	class UrlsController extends AppController{
		public function index() {
			$this->set('urls', $this->Url->find('all'));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid url'));
			}
			$url = $this->Url->findById($id);
			if (!$url) {
				throw new NotFoundException(__('Invalid url'));
			}
			$this->set('url', $url);
		}
		 public function add() {
			$users = $this->Url->User->find('list'); //List return a numeric array with the ids
			if ($this->request->is('post')) {
				$this->Url->create();
				if ($this->Url->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			$this->set('users', $users);
		}
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid url'));
			}

			$url = $this->Url->findById($id);
			if (!$url) {
				throw new NotFoundException(__('Invalid url'));
			}

			if ($this->request->is(array('url', 'put'))) {
				$this->Url->id = $id;
				if ($this->Url->save($this->request->data)) {
					$this->Session->setFlash(__('Your url has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your url.'));
			}

			if (!$this->request->data) {
				$this->request->data = $url;
			}
		}
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Url->delete($id)) {
				$this->Session->setFlash(__('The url with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}

?>