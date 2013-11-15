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
			$commentsfull = $proposal['Comment'];
			$questionsfull = $proposal['Question'];
			$resourcesfull= $proposal['Resource'];
			//pr($commentsfull);
			$comments=[];
			$questions=[];
			$answers=[];
			$usernames=[];
			$usernames_questions=[];
			$comments_id=[];
			$questions_id=[];
			
			$resources=[];
			$resources_id=[];
			$usernames_resources=[];
			
			
			foreach($commentsfull as $comment){
				array_push($comments,$comment['comment']);
				array_push($comments_id,$comment['id']);
				$user_id= $comment['user_id'];
				$user = $this->Proposal->User->find('all',array('conditions' => array('User.id' =>$user_id)));
				array_push($usernames,$user[0]['User']['username']);
			}
			foreach($questionsfull as $question){
				array_push($questions,$question['question']);
				array_push($answers,$question['answer']);
				array_push($questions_id,$question['id']);
				$user_id= $question['user_id'];
				$user = $this->Proposal->User->find('all',array('conditions' => array('User.id' =>$user_id)));
				array_push($usernames_questions,$user[0]['User']['username']);
			}
			
			foreach($resourcesfull as $resource){
				array_push($resources,$resource['link']);
				array_push($resources_id,$resource['id']);
				$user_id= $resource['user_id'];
				$user = $this->Proposal->User->find('all',array('conditions' => array('User.id' =>$user_id)));
				array_push($usernames_resources,$user[0]['User']['username']);
			}
			//pr($comments);
			$largo=count($usernames);
			$this->set('usernames',$usernames);
			$this->set('comments',$comments);
			$this->set('comments_id',$comments_id);
			$this->set('proposal', $proposal);
			$this->set('largo',$largo);
			$this->set('proposal_id',$id);
			
			$largoQuestions=count($usernames_questions);
			$this->set('usernames_questions',$usernames_questions);
			$this->set('answers',$answers);
			$this->set('questions_id',$questions_id);
			$this->set('questions', $questions);
			$this->set('largoQuestions',$largoQuestions);
			
			$largoResources=count($usernames_resources);
			$this->set('usernames_resources',$usernames_resources);
			$this->set('resources',$resources);
			$this->set('resources_id',$resources_id);
			$this->set('largoResources',$largoResources);
		}
		//Pueden verlo solo administradores
		 public function add() {
			$user_id= $this -> Session -> read("User")['User']['id'];
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
			$this->set('user_id',$user_id);
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

		/*Privacy*/
		/*Protected views that only a valid user can access*/
		public function beforeFilter() {
			parent::beforeFilter();
			/*Aquí se validaría lo que hace un administrador y un usuario normal*/
			if(!$this->Session->check('User'))
			{
				$this->redirect(array(
				'controller' => 'users',
				'action' => 'login' //se restringe el acceso y se redirecciona a la págian de login
				));	
			}
			else //En caso de que haya sesión activa, restringir a los usuarios las tareas administrativas
			{
				$temp = $this->Session->read('User');
				if(intval($temp['User']['user_type']) == 2) // 2 = Usuario, 1 = Administrador
				{
					if($this->request->action == 'delete')
					{
						$this->Session->setFlash('No se ha encontrado la página solicitada.');
						$this->redirect(array('controller' => 'users',
						'action' => 'uprofile'
						));	
					}
					if($this->request->action == 'add')
					{
						$this->Session->setFlash('No se ha encontrado la página solicitada.');
						$this->redirect(array('controller' => 'users',
						'action' => 'uprofile'
						));	
					}
					if($this->request->action == 'edit')
					{
						$this->Session->setFlash('No se ha encontrado la página solicitada.');
						$this->redirect(array('controller' => 'users',
						'action' => 'uprofile'
						));	
					}	
				}
			}
		}
	}
	
?>