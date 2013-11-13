<?php

class UrlsController extends AppController{
	public function index(){
		$this ->layout='user';
		$user_id = (int)$this -> Session -> read("User")['User']['id'];
		$urls = $this->Url->find('all', array(
					'conditions' => array('Url.user_id' => $user_id)));

		$this->set('urls', $urls);
	}
	public function add()
	{
		/*Fetch all the users so that the dropdown can be filled*/
		$users = $this->Url->User->find('list'); //List return a numeric array with the ids

		//$urls = $this->Url->find('list');


		if($this->request->is('post'))
		{
				$this->Url->save($this->request->data);
		}

		$this->set('users', $users);

	}
}

?>