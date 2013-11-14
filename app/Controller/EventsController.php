<?php
	class EventsController extends AppController {
		//Pueden verlo solo administradores
		public function index() {
			$this->set('title_for_layout','Business Meeting - Eventos');
			$this ->layout='admin';
			$this->set('events', $this->Event->find('all'));
		}
		//Pueden verlo  administradores y  usuarios
		public function view($id = null) {
			
			$this->set('title_for_layout','Business Meeting - Informamación evento');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid event'));
			}
			$event = $this->Event->findById($id);
			if (!$event) {
				throw new NotFoundException(__('Invalid event'));
			}
			$this->set('event', $event);
		}
		//Pueden verlo  solo administradores
		 public function add() {
			$this->set('title_for_layout','Business Meeting - Agregar Envento');
			$this ->layout='admin';
			if ($this->request->is('post')) {
				$this->Event->create();
				if ($this->Event->save($this->request->data)) {
					$this->Session->setFlash('Su evento ha sido creado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
		}
		//Pueden verlo solo administradores
		public function edit($id = null) {
			$this->set('title_for_layout','Business Meeting - Editar evento');
			$this ->layout='user';
			if (!$id) {
				throw new NotFoundException(__('Invalid event'));
			}

			$event = $this->Event->findById($id);
			if (!$event) {
				throw new NotFoundException(__('Invalid event'));
			}

			if ($this->request->is(array('event', 'put'))) {
				$this->Event->id = $id;
				if ($this->Event->save($this->request->data)) {
					
					$this->Session->setFlash('Su evento ha sido actualizado.','default',array('class' => 'success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your event.'));
			}

			if (!$this->request->data) {
				$this->request->data = $event;
			}
		}
		//Pueden verlo  solo administradores
		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Event->delete($id)) {
				$this->Session->setFlash(__('The event with id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
	
?>