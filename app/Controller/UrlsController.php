<?php

class UrlsController extends AppController{
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

        public function index()
        {
                
        }
}

?>