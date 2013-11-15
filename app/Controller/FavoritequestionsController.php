<?php

	class FavoritequestionsController extends AppController{
		//Pueden verlo solo administradores
		public function index() {
			$user_id= $this -> Session -> read("User")['User']['id'];
			$favoritequestions = $this->Favoritequestion->find('all',array('conditions' => array('Favoritequestion.user_id' =>$user_id)));
			$this->set('title_for_layout','Business Meeting - Pregunta Favoritos');
			$this ->layout='user';
			$this->set('favoritequestions', $favoritequestions);
		}
		//Pueden verlo administradores y usuarios
	/*	public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Pregunta Favorito');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid favoritequestion'));
			}
			$favoritequestion = $this->Favoritequestion->findById($id);
			if (!$favoritequestion) {
				throw new NotFoundException(__('Invalid favoritequestion'));
			}
			$this->set('favoritequestion', $favoritequestion);
		}*/
		//Pueden verlo solo administradores
		 public function add($id=null,$id_proposal=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Favorito');
			$user_id= $this -> Session -> read("User")['User']['id'];
			$this->Favoritequestion->create();
			$datos =array
			(
				"Favoritequestion" => array
					(
						"question_id" => $id,
						"user_id" => $user_id
					)

			);
			if ($this->Favoritequestion->save($datos)) {
				$this->Session->setFlash('favorito agregado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'view', 'controller' => 'proposals',$id_proposal));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}
	
		//Pueden verlo solo administradores
		public function delete($id=null) {
			if ($this->Favoritequestion->delete($id)) {
				$this->Session->setFlash('La pregunta Favorito ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index', 'controller' => 'favoritequestions'));
			}
		}
}

?>