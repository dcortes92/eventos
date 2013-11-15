<?php
	class ReviewsController extends AppController {
		
		//Pueden verlo todos los usuarios, se accede desde propuestas
		 public function add($id=null) {
			$this->set('title_for_layout','Business Meeting - Agregar Calificacion');
			$this ->layout='admin';
			
			//$review = $this->Review->find('list');
			
			if ($this->request->is('post')) {
				$this->Review->create();
				if ($this->Review->save($this->request->data)) {
					$this->Session->setFlash('El calificacion ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index', 'controller' => 'proposals'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
			//$this->set('review', $review);
			$this->set('proposal_id',$id);
		}
	}
	
?>