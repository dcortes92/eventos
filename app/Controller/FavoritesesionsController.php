<?php

	class FavoritesesionsController extends AppController{
		//Pueden verlo solo administradores
		public function index() {
			$user_id= $this -> Session -> read("User")['User']['id'];
			$favoritesesions = $this->Favoritesesion->find('all',array('conditions' => array('Favoritesesion.user_id' =>$user_id)));
			pr($favoritesesions);
			$this->set('title_for_layout','Business Meeting - Sesion Favoritos');
			$this ->layout='user';
			$this->set('favoritesesions', $favoritesesions);
		}
		//Pueden verlo administradores y usuarios
	/*	public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Sesion Favorito');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid favoritesesion'));
			}
			$favoritesesion = $this->Favoritesesion->findById($id);
			if (!$favoritesesion) {
				throw new NotFoundException(__('Invalid favoritesesion'));
			}
			$this->set('favoritesesion', $favoritesesion);
		}*/
		//Pueden verlo solo administradores
		 public function add($id_sesion=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Favorito');
			$user_id= $this -> Session -> read("User")['User']['id'];
			$this->Favoritesesion->create();
			$datos =array
			(
				"Favoritesesion" => array
					(
						"sesion_id" => $id_sesion,
						"user_id" => $user_id
					)

			);
			if ($this->Favoritesesion->save($datos)) {
				$this->Session->setFlash('favorito agregado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'view', 'controller' => 'sesions',$id_sesion));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}
	
		//Pueden verlo solo administradores
		public function delete($id=null) {
			if ($this->Favoritesesion->delete($id)) {
				$this->Session->setFlash('La sesion Favorita ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index', 'controller' => 'favoritesesions'));
			}
		}
}

?>