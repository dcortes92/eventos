<?php
	class SesionsController extends AppController {
		//Pueden verlo solo administradores
		public function index() {
			$type = intval($this->Session->read('User')['User']['user_type']);	
			if($type == 1) //Admin
			{
				$this->set('title_for_layout','Business Meeting - Sesiones');
				$this ->layout='admin';
				$this->set('sesions', $this->Sesion->find('all'));
			}
			else if($type==2){
				$this->redirect(array(
					'controller' => 'sesions',
					'action' => 'indexnormal'
				));
			}
			
		}
		public function indexnormal() {
			$this->set('title_for_layout','Business Meeting - Sesiones');
			$this ->layout='user';
			$this->set('sesions', $this->Sesion->find('all'));
			
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Sesion');
			$this ->layout='admin';
			if (!$id) {
				throw new NotFoundException(__('Invalid sesion'));
			}
			$sesion = $this->Sesion->findById($id);
			if (!$sesion) {
				throw new NotFoundException(__('Invalid sesion'));
			}
			$event_id= $sesion['Proposal']['event_id'];
			
			$event = $this->Sesion->Proposal->Event->find('all',array('conditions' => array('Event.id' =>$event_id)));
			$this->set('event',$event);
			$this->set('sesion', $sesion);
			$this->set('sesion_id',$sesion['Sesion']['id']);
		}
		//Pueden verlo solo administradores
		 public function selectproposal(){
			$this->set('title_for_layout','Business Meeting - Seleccionar Propuesta');
			$this ->layout='admin';
			$proposals = $this->Sesion->Proposal->find('all');
			$this->set('proposals', $proposals);
		 }
		 //Pueden verlo solo administradores
		 public function add($id=null) {
			$this->set('title_for_layout','Business Meeting - Crear Sesion');
			$this ->layout='admin';
			$proposal= $this->Sesion->Proposal->findById($id);
			$event_id=$proposal['Proposal']['event_id'];
			$halls = $this->Sesion->Hall->find('list');
			$threads =$this->Sesion->Thread->find('list',array('conditions' => array('Thread.event_id' =>$event_id)));
		
			if ($this->request->is('post')) {
				$this->Sesion->create();
				if ($this->Sesion->save($this->request->data)) {
					$this->Session->setFlash('La Sesión ha sido creada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Session->setFlash(__('Unable to add your post.'));
				}
			}
			$this->set('proposal_id',$id);
            $this->set('halls', $halls);
			$this->set('threads', $threads );
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar Sesion');
			$this ->layout='admin';
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
					$this->Session->setFlash('La sesión ha sido actualizada.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your sesion.'));
			}

			if (!$this->request->data) {
				$this->request->data = $sesion;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			$this->set('title_for_layout','Business Meeting - Borrar Sesion');
			$this ->layout='admin';
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Sesion->delete($id)) {
				$this->Session->setFlash('La Sesión ha sido borrada.','default',array('class' => 'success'));
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
					if($this->request->action == 'edit')
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
					if($this->request->action == 'view')
					{
						$this->Session->setFlash('No se ha encontrado la página solicitada.');
						$this->redirect(array('controller' => 'users',
						'action' => 'uprofile'
						));	
					}
					if($this->request->action == 'selectproposal')
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