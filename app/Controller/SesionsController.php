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
		
		 public function selectproposal(){
			$proposals = $this->Sesion->Proposal->find('all');
			$this->set('proposals', $proposals);
		 }
		 public function add($id=null) {
			$proposal= $this->Sesion->Proposal->findById($id);
			//pr($proposal);
			$halls = $this->Sesion->Hall->find('list');
			//pr($proposal['Event']['id']);
			$threads =$this->Sesion->Thread->find('list',array('conditions' => array('Thread.event_id' =>$proposal['Proposal']['event_id'])));
			pr($threads);
			//$threads2 =$this->Sesion->Thread->findByEvent_id($proposal['Proposal']['event_id']);
			
			//pr($threads2);
			
			$proposals = $this->Sesion->Proposal->find('list');
			//$pruebaSesion = $this->Sesion->Thread->findByEvent_id($proposal['Proposal']['event_id']);
			//pr($pruebaSesion);
			$sesions= $this->Sesion->find('all',array('conditions' => array('Sesion.id ' =>'1')));
			//pr($sesions);
			//pr($proposals);
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
			$this->set('proposal_id',$id);
            $this->set('halls', $halls);
			$this->set('threads', $threads );
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