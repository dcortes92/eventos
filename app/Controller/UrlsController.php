<?php

	class UrlsController extends AppController{
		//Pueden verlo solo administradores
		public function index() {
			$user_id= $this -> Session -> read("User")['User']['id'];
			$urls =$this->Url->find('all',array('conditions' => array('Url.user_id' =>$user_id)));
			$this->set('title_for_layout','Business Meeting - Urls');
			$this ->layout='user';
			$this->set('urls', $urls);
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Url');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid url'));
			}
			$url = $this->Url->findById($id);
			if (!$url) {
				throw new NotFoundException(__('Invalid url'));
			}
			$this->set('url', $url);
		}
		//Pueden verlo solo administradores
		 public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar Url');
			$this ->layout='user';
			$users= $this->Url->User->find('list');
			if ($this->request->is('post')) {
				$this->Url->create();
				if ($this->Url->save($this->request->data)) {
					$this->Session->setFlash('La url ha sido creada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			$this->set('users', $users);
		}
		//Pueden verlo solo administradores
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
					$this->Session->setFlash('La url ha sido actualizada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your url.'));
			}

			if (!$this->request->data) {
				$this->request->data = $url;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			$this->set('title_for_layout','Business Meeting - Borrar Url');
			$this ->layout='user';
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Url->delete($id)) {
				$this->Session->setFlash('La Url ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}

?>