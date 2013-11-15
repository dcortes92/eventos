<?php
	class SpeakersController extends AppController {
		//Pueden verlo administradores y usuarios
		public function index() {
			$this->set('title_for_layout','Business Meeting - Ponentes');
			$this ->layout='user';
			$user_id= $this -> Session -> read("User")['User']['id'];
			$speakers = $this->Speaker->find('all',array('conditions' => array('Speaker.user_id' =>$user_id)));
			$this->set('speakers', $speakers);
		}
		//Solo puede acceder el administrador muestra todos los ponentes
		public function indexadmin() {
			$this->set('title_for_layout','Business Meeting - Ponente');
			$this ->layout='admin';
			$this->set('speakers', $this->Speaker->find('all'));
			
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Ponente');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid speaker'));
			}
			$speaker = $this->Speaker->findById($id);
			if (!$speaker) {
				throw new NotFoundException(__('Invalid speaker'));
			}
			$this->set('speaker', $speaker);
		}
		//Pueden verlo todos los usuarios, se accede desde propuestas
		 public function add($id=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Ponente');
			$this ->layout='admin';
			$users = $this->Speaker->User->find('list');
			//$speakers = $this->Speaker->find('list');
			
			if ($this->request->is('post')) {
				$this->Speaker->create();
				if ($this->Speaker->save($this->request->data)) {
					$this->Session->setFlash('El ponente ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index', 'controller' => 'proposals'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('speakers', $speakers);
			$this->set('proposal_id',$id);
			$this->set('users',$users);
		}
		
		//Pueden verlo solo administradores
		public function delete($id) {
			$speakers = $this->Speaker->find('all',array('conditions' => array('Speaker.proposal_id' =>$id)));
			if ($this->request->is('post')) {
			}
			$this->set('speakers',$speakers);
			$this->set('proposal_id',$id);
		}
		
		public function deletedos($proposal_id, $user_id) {
			$speaker_id = $this->Speaker->find('all',array('conditions' => array('Speaker.proposal_id' =>$proposal_id, 'Speaker.user_id' => $user_id)));
			pr($speaker_id);
			if ($this->Speaker->delete($speaker_id[0]['Speaker']['id'])) {
				$this->Session->setFlash('El ponente ha sido borrado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index', 'controller' => 'proposals'));
			}

			
		}
	}
	
?>