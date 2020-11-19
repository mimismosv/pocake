<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */

$nombre = '';

class UsersController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role']  === 'user')
        {
            if(in_array($this->request->action, ['home', 'logout']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);

    }


    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } 
            else
            {
                $this->Flash->Error('Quien sos perro.....', ['key' => 'auth']);
            }
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    public function home(){
        $this->render();
    }

    public function index()  
    {
        $users = $this->paginate($this->Users);
        $this->set('users',$users);
    } 
  
    public function view($id)  
    {
        $user = $this->Users->get($id);
        $this->set('user',$user); 
    } 

    public function add()  
    {
        $user = $this->Users->newEntity();

        if($this->request->is('post'))   
        {
            //debug($this->request->data);
            $user = $this->Users->patchEntity($user, $this->request->data);

            if($this->Users->save($user))
            {
                $this->Flash->success('El usuario se creo correctamente');
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
            else
            {
                $this->Flash->error('No se creo :(');
            }
        }

        $this->set(compact('user'));
    } 

}
