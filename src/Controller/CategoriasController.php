<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 *
 * @method \App\Model\Entity\Categoria[] paginate($object = null, array $settings = [])
 */
class CategoriasController extends AppController
{
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->layout('admin'); 
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $categorias = $this->Categorias->find('all',['conditions' => ['flg_ativo' => true]]);
        $this->set('categorias',$categorias);
        $this->set('_serialize', ['categorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id);
        $this->set('categoria', $categoria);
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoria = $this->Categorias->newEntity();
          if ($this->request->is('post')) {
              $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
              $categoria->flg_ativo = true;
              if ($this->Categorias->save($categoria)) {
                  $this->Flash->success('A categoria foi cadastrada com sucesso.');
                   return $this->redirect(['action' => 'index']);
              }
          }
        $this->set(compact('categoria'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('A categoria foi editada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        $categoria->flg_ativo = false;
        if ($this->Categorias->save($categoria)) {
            $this->Flash->success(__('A categoria foi deletada com sucesso.'));
        } else {
            $this->Flash->error(__('The categoria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
