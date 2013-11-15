<?php
	class CommentsController extends AppController {
		//Pueden verlo administradores y usuarios
		public function index() {
			$this->set('title_for_layout','Business Meeting - Comentarios');
			$this ->layout='user';
			$user_id= $this -> Session -> read("User")['User']['id'];
			$comments = $this->Comment->find('all',array('conditions' => array('Comment.user_id' =>$user_id)));
			$this->set('comments', $comments);
		}
		//Solo puede acceder el administrador muestra todos los comentarios
		public function indexadmin() {
			$this->set('title_for_layout','Business Meeting - Comentario');
			$this ->layout='admin';
			$this->set('comments', $this->Comment->find('all'));
			
		}
		//Pueden verlo administradores y usuarios
		public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Comentario');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid comment'));
			}
			$comment = $this->Comment->findById($id);
			if (!$comment) {
				throw new NotFoundException(__('Invalid comment'));
			}
			$this->set('comment', $comment);
		}
		//Pueden verlo todos los usuarios, se accede desde propuestas
		 public function add($id=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Comentario');
			$this ->layout='admin';
			
			//$comments = $this->Comment->find('list');
			
			if ($this->request->is('post')) {
				$this->Comment->create();
				if ($this->Comment->save($this->request->data)) {
					$this->Session->setFlash('El comentario ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index', 'controller' => 'proposals'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('comments', $comments);
			$this->set('proposal_id',$id);
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar Comentario');
			$this ->layout='admin';
			if (!$id) {
				throw new NotFoundException(__('Invalid comment'));
			}

			$comment = $this->Comment->findById($id);
			if (!$comment) {
				throw new NotFoundException(__('Invalid comment'));
			}

			if ($this->request->is(array('comment', 'put'))) {
				$this->Comment->id = $id;
				if ($this->Comment->save($this->request->data)) {
					$this->Session->setFlash('El comentario ha sido editado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your comment.'));
			}

			if (!$this->request->data) {
				$this->request->data = $comment;
			}
		}
		//Pueden verlo solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Comment->delete($id)) {
				$this->Session->setFlash('El comentario ha sido borrado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>