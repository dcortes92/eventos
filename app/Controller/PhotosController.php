<?php

class PhotosController extends AppController{
		public function index()
	{
		$this ->layout='user';
		$user_id = (int)$this -> Session -> read("User")['User']['id'];
		$photos = $this->Photo->find('all', array(
					'conditions' => array('Photo.user_id' => $user_id)));

		$this->set('photos', $photos);
	}
	
	public function add()
	{
			/*Fetch all the users so that the dropdown can be filled*/
			$users = $this->Photo->User->find('list'); //List return a numeric array with the ids

			//$photos = $this->Photo->find('list');


			if($this->request->is('post'))
			{
					$this->Photo->save($this->request->data);
			}

			$this->set('users', $users);

			//$this->set('photos', $photos);
	}
}

?>