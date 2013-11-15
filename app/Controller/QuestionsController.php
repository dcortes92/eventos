<?php
	class QuestionsController extends AppController {
		//Pueden verlo administradores y usuarios
		public function index() {
			$this->set('title_for_layout','Business Meeting - Preguntas');
			$this ->layout='user';
			$user_id= $this -> Session -> read("User")['User']['id'];
			$questions = $this->Question->find('all',array('conditions' => array('Question.user_id' =>$user_id)));
			$this->set('questions', $questions);
		}
		//Solo puede acceder el administrador muestra todos los preguntas
		public function indexadmin() {
			$this->set('title_for_layout','Business Meeting - Pregunta');
			$this ->layout='admin';
			$this->set('questions', $this->Question->find('all'));
			
		}
		
		public function answer($id = null, $proposal_id){
			$this->set('title_for_layout','Business Meeting - Editar Pregunta');
			$this ->layout='admin';
			if (!$id) {
				throw new NotFoundException(__('Invalid question'));
			}

			$question = $this->Question->findById($id);
			if (!$question) {
				throw new NotFoundException(__('Invalid question'));
			}

			if ($this->request->is(array('question', 'put'))) {
				$this->Question->id = $id;
				if ($this->Question->save($this->request->data)) {
					$this->Session->setFlash('El pregunta ha sido respondida.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'view', 'controller' => 'proposals', $proposal_id));
				}
				$this->Session->setFlash(__('Unable to update your question.'));
			}

			if (!$this->request->data) {
				$this->request->data = $question;
			}
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Pregunta');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			if (!$id) {
				throw new NotFoundException(__('Invalid question'));
			}
			$question = $this->Question->findById($id);
			if (!$question) {
				throw new NotFoundException(__('Invalid question'));
			}
			$this->set('question', $question);
		}
		//Pueden verlo todos los usuarios, se accede desde propuestas
		 public function add($id=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Pregunta');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			
			if ($this->request->is('post')) {
				$this->Question->create();
				if ($this->Question->save($this->request->data)) {
					$this->Session->setFlash('El pregunta ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index', 'controller' => 'proposals'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('questions', $questions);
			$this->set('proposal_id',$id);
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar Pregunta');
			$this ->layout='admin';
			if (!$id) {
				throw new NotFoundException(__('Invalid question'));
			}

			$question = $this->Question->findById($id);
			if (!$question) {
				throw new NotFoundException(__('Invalid question'));
			}

			if ($this->request->is(array('question', 'put'))) {
				$this->Question->id = $id;
				if ($this->Question->save($this->request->data)) {
					$this->Session->setFlash('El pregunta ha sido editado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your question.'));
			}

			if (!$this->request->data) {
				$this->request->data = $question;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Question->delete($id)) {
				$this->Session->setFlash('El pregunta ha sido borrado.','default',array('class' => 'success'));
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
				}
			}
		}
	}
	
?>