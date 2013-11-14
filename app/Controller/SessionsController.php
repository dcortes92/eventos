<?php
	class SesionsController extends AppController {
		public function index() {
			$this->set('sesions', $this->Sesion->find('all'));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid sesion'));
			}
			$sesion = $this->Sesion->findById($id);
			if (!$sesion) {
				throw new NotFoundException(__('Invalid sesion'));
			}
			$this->set('sesion', $sesion);
		}
		
		 public function add() {
			
			$halls = $this->Session->Sesion->Hall->find('list');
			$threads = $this->Session->Sesion->Thread->find('list');
			$proposals = $this->Session->Sesion->Proposal->find('list');
			
			//$sesions = $this->Sesion->find('list');
			
			if ($this->request->is('post')) {
				$this->Sesion->create();
				if ($this->Sesion->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('sesions', $sesions);

            $this->set('halls', $halls);
			$this->set('threads', $threads);
			$this->set('proposals', $proposals);
		}
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid sesion'));
			}

			$sesion = $this->Sesion->findById($id);
			if (!$sesion) {
				throw new NotFoundException(__('Invalid sesion'));
			}

			if ($this->request->is(array('sesion', 'put'))) {
				$this->Sesion->id = $id;
				if ($this->Sesion->save($this->request->data)) {
					$this->Session->setFlash(__('Your sesion has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your sesion.'));
			}

			if (!$this->request->data) {
				$this->request->data = $sesion;
			}
		}
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Sesion->delete($id)) {
				$this->Session->setFlash(__('The sesion with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>