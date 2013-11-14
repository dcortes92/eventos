<?php
	class ProposalsController extends AppController {
		public function index() {
			$this->set('proposals', $this->Proposal->find('all'));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid proposal'));
			}
			$proposal = $this->Proposal->findById($id);
			if (!$proposal) {
				throw new NotFoundException(__('Invalid proposal'));
			}
			$this->set('proposal', $proposal);
		}
		
		 public function add($id = null) {
			
			$events = $this->Proposal->Event->find('list');
			//$proposals = $this->Proposal->find('list');
			
			if ($this->request->is('post')) {
				$this->Proposal->create();
				if ($this->Proposal->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			pr($id);
			//$this->set('proposals', $proposals);
			$this->set('proposal_id',$id);
            $this->set('events', $events);
		}
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid proposal'));
			}

			$proposal = $this->Proposal->findById($id);
			if (!$proposal) {
				throw new NotFoundException(__('Invalid proposal'));
			}

			if ($this->request->is(array('proposal', 'put'))) {
				$this->Proposal->id = $id;
				if ($this->Proposal->save($this->request->data)) {
					$this->Session->setFlash(__('Your proposal has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your proposal.'));
			}

			if (!$this->request->data) {
				$this->request->data = $proposal;
			}
		}
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Proposal->delete($id)) {
				$this->Session->setFlash(__('The proposal with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>