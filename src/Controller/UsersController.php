<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add','logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        
        $this->paginate = [
            'contain' => ['Pessoas', 'Perfis']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Pessoas', 'Perfis']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->viewBuilder()->layout('login');

        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(),['associated' => ['Pessoas']]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Bem vindo, obrigado por nos ajudar, para o seu primeiro acesso informe o email e a senha.'));

                return $this->redirect(['action' => 'login']);
            }else{
                $this->Flash->error("Email já encontra-se em uso");
            }
            
        }
  
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');

      $associated = [
            'Pessoas',
            'Pessoas.Enderecos' => ['validate' => false],
            'Pessoas.Enderecos.Cidades' => ['validate' => false],
            'Pessoas.Enderecos.Cidades.Estados' => ['validate' => false],
            'Pessoas.Enderecos.Cidades.Estados.Pais' => ['validate' => false]
            ];

        $user = $this->Users->get($id, [
            'contain' => 'Pessoas'
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
          
            $user = $this->Users->patchEntity($user,$this->request->getData(),[
                'associated' => $associated,
            ]);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Suas Informções foram gravadas com sucesso.'));
            return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $pais = $this->Users->Pessoas->Enderecos->Cidades->Estados->Pais->find('list',['keyField' => 'id','valueField' => 'nome']);

        $estados = $this->Users->Pessoas->Enderecos->Cidades->Estados->find('list',['keyField' => 'id','valueField' => 'nome']);

        $cidades = $this->Users->Pessoas->Enderecos->Cidades->find('list',['keyField' => 'id','valueField' => 'nome']);

        $this->set(compact('user', 'pais','estados','cidades'));
        $this->set('_serialize', ['user','pais','cidades','estados']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        if(!is_null($this->Auth->user('id'))){
                return $this->redirect($this->Auth->redirectUrl());
        }
        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
             $user = $this->Auth->identify();
             if ($user) {
                 $this->Auth->setUser($user);
                 return $this->redirect($this->Auth->redirectUrl());
             } else {
                 $this->Flash->error(__('Usuário ou senha inválido'));
             }
         }
    }

    public function logout()
    {
            $this->request->session()->destroy();
            return $this->redirect($this->Auth->logout());
    }
}
