<?php

	class FavoriteresourcesController extends AppController{
		//Pueden verlo solo administradores
		public function index() {
			$user_id= $this -> Session -> read("User")['User']['id'];
			$favoriteresources = $this->Favoriteresource->find('all',array('conditions' => array('Favoriteresource.user_id' =>$user_id)));
			$this->set('title_for_layout','Business Meeting - Recurso Favoritos');
			$this ->layout='user';
			$this->set('favoriteresources', $favoriteresources);
		}
		//Pueden verlo administradores y usuarios
	/*	public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Recurso Favorito');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid favoriteresource'));
			}
			$favoriteresource = $this->Favoriteresource->findById($id);
			if (!$favoriteresource) {
				throw new NotFoundException(__('Invalid favoriteresource'));
			}
			$this->set('favoriteresource', $favoriteresource);
		}*/
		//Pueden verlo solo administradores
		 public function add($id=null,$id_proposal=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Favorito');
			$user_id= $this -> Session -> read("User")['User']['id'];
			$this->Favoriteresource->create();
			$datos =array
			(
				"Favoriteresource" => array
					(
						"resource_id" => $id,
						"user_id" => $user_id
					)

			);
			if ($this->Favoriteresource->save($datos)) {
				$this->Session->setFlash('favorito agregado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'view', 'controller' => 'proposals',$id_proposal));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}
	
		//Pueden verlo solo administradores
		public function delete($id=null) {
			if ($this->Favoriteresource->delete($id)) {
				$this->Session->setFlash('La recurso Favorito ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index', 'controller' => 'favoriteresources'));
			}
		}
}

?>