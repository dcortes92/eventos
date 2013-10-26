<?php

class ProductsController extends AppController{
	public function add()
	{
		/*Fetch all the users so that the dropdown can be filled*/
		$users = $this->Product->User->find('list'); //List return a numeric array with the ids 
		if($this->request->is('post'))
		{
			$this->Product->save($this->request->data);
		}

		$this->set('users', $users);
	}
}

?>