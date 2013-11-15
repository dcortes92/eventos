<?php

	class FavoriteproposalsController extends AppController{
		//Pueden verlo solo administradores
		public function index() {
			$user_id= $this -> Session -> read("User")['User']['id'];
			$favoriteproposals = $this->Favoriteproposal->find('all',array('conditions' => array('Favoriteproposal.user_id' =>$user_id)));
			$this->set('title_for_layout','Business Meeting - Propuesta Favoritos');
			$this ->layout='user';
			$this->set('favoriteproposals', $favoriteproposals);
		}
		//Pueden verlo administradores y usuarios
	/*	public function view($id = null) {
			$this->set('title_for_layout','Business Meeting - Ver Propuesta Favorito');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid favoriteproposal'));
			}
			$favoriteproposal = $this->Favoriteproposal->findById($id);
			if (!$favoriteproposal) {
				throw new NotFoundException(__('Invalid favoriteproposal'));
			}
			$this->set('favoriteproposal', $favoriteproposal);
		}*/
		//Pueden verlo solo administradores
		 public function add($id_proposal=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Favorito');
			$user_id= $this -> Session -> read("User")['User']['id'];
			$this->Favoriteproposal->create();
			$datos =array
			(
				"Favoriteproposal" => array
					(
						"proposal_id" => $id_proposal,
						"user_id" => $user_id
					)

			);
			if ($this->Favoriteproposal->save($datos)) {
				$this->Session->setFlash('favorito agregado.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'view', 'controller' => 'proposals',$id_proposal));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}
	
		//Pueden verlo solo administradores
		public function delete($id=null) {
			if ($this->Favoriteproposal->delete($id)) {
				$this->Session->setFlash('La propuesta Favorito ha sido borrada.','default',array('class' => 'success'));
				return $this->redirect(array('action' => 'index', 'controller' => 'favoriteproposals'));
			}
		}
}

?>