<?php

	class FavoritecommentsController extends AppController{
		//Pueden verlo solo administradores
		public function index() {
			$user_id= $this -> Session -> read("User")['User']['id'];
			$favoritecomments = $this->Favoritecomment->find('all',array('conditions' => array('Favoritecomment.user_id' =>$user_id)));
			$this->set('title_for_layout','Business Meeting - Comentario Favoritos');
			$temp = $this->Session->read('User');
			if(intval($temp['User']['user_type']) == 1)
				$this->layout = 'admin';
			else
				$this->layout = 'user';
			$this->set('favoritecomments', $favoritecomments);
		}
		//Pueden verlo administradores y usuarios
		/*public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Comentario Favorito');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid favoritecomment'));
			}
			$favoritecomment = $this->Favoritecomment->findById($id);
			if (!$favoritecomment) {
				throw new NotFoundException(__('Invalid favoritecomment'));
			}
			$this->set('favoritecomment', $favoritecomment);
		}*/
		//Pueden verlo solo administradores
		 public function add($id=null,$id_proposal) {
			$this->set('title_for_layout','Business Meeting - Agregar Favorito');
			$user_id= $this -> Session -> read("User")['User']['id'];
			$this->Favoritecomment->create();
			$datos =array
			(
				"Favoritecomment" => array
					(
						"comment_id" => $id,
						"user_id" => $user_id
					)

			);
			if ($this->Favoritecomment->save($datos)) {
				$this->Session->setFlash('favorito agregado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'view', 'controller' => 'proposals',$id_proposal));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}
	
		//Pueden verlo solo administradores
		public function delete($id=null) {
			if ($this->Favoritecomment->delete($id)) {
				$this->Session->setFlash('La comentario Favorito ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index', 'controller' => 'favoritecomments'));
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
	}
}

?>