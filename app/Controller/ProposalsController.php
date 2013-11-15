<?php
	class ProposalsController extends AppController {
		//Pueden verlo solo administradores
		public function index() {
			$type = intval($this->Session->read('User')['User']['user_type']);	
			
			
			if($type == 1) //Admin
			{
				
				$this->set('title_for_layout','Business Meeting - Propuestas');
				$this ->layout='admin';
				$proposals=$this->Proposal->find('all');
				$this->set('proposals', $proposals);
			}
			else if($type==2){
				$this->redirect(array(
					'controller' => 'proposals',
					'action' => 'indexnormal'
				));
			}
		}
		public function indexnormal() {
			$this->set('title_for_layout','Business Meeting - Propuestas');
			$this ->layout='admin';
			$this->set('proposals', $this->Proposal->find('all'));
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Propuesta');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid proposal'));
			}
			$proposal = $this->Proposal->findById($id);
			if (!$proposal) {
				throw new NotFoundException(__('Invalid proposal'));
			}
			$this->set('proposal', $proposal);
		}
		//Pueden verlo solo administradores
		 public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar Propuestas');
			$this ->layout='admin';
			$events = $this->Proposal->Event->find('list');
			
			//$proposals = $this->Proposal->find('list');
			
			if ($this->request->is('post')) {
				$this->Proposal->create();
				if ($this->Proposal->save($this->request->data)) {
					$this->Session->setFlash('La propuesta ha sido creada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('proposals', $proposals);

            $this->set('events', $events);
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar Propuestas');
			$this ->layout='admin';
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
					$this->Session->setFlash('La propuesta ha sido actualisada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your proposal.'));
			}

			if (!$this->request->data) {
				$this->request->data = $proposal;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Proposal->delete($id)) {
				$this->Session->setFlash('La propuesta ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>