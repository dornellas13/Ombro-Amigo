<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutosSolicitacoes Controller
 *
 * @property \App\Model\Table\ProdutosSolicitacoesTable $ProdutosSolicitacoes
 *
 * @method \App\Model\Entity\ProdutosSolicitaco[] paginate($object = null, array $settings = [])
 */
class ProdutosSolicitacoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $this->paginate = [
            'contain' => ['Categorias']
        ];
        $produtosSolicitacoes = $this->paginate($this->ProdutosSolicitacoes);

        $this->set(compact('produtosSolicitacoes'));
        $this->set('_serialize', ['produtosSolicitacoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Produtos Solicitaco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtosSolicitaco = $this->ProdutosSolicitacoes->get($id, [
            'contain' => ['Categorias']
        ]);

        $this->set('produtosSolicitaco', $produtosSolicitaco);
        $this->set('_serialize', ['produtosSolicitaco']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtosSolicitaco = $this->ProdutosSolicitacoes->newEntity();
        if ($this->request->is('post')) {
            $produtosSolicitaco = $this->ProdutosSolicitacoes->patchEntity($produtosSolicitaco, $this->request->getData());
            if ($this->ProdutosSolicitacoes->save($produtosSolicitaco)) {
                $this->Flash->success(__('The produtos solicitaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos solicitaco could not be saved. Please, try again.'));
        }
        $categorias = $this->ProdutosSolicitacoes->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('produtosSolicitaco', 'categorias'));
        $this->set('_serialize', ['produtosSolicitaco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos Solicitaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtosSolicitaco = $this->ProdutosSolicitacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosSolicitaco = $this->ProdutosSolicitacoes->patchEntity($produtosSolicitaco, $this->request->getData());
            if ($this->ProdutosSolicitacoes->save($produtosSolicitaco)) {
                $this->Flash->success(__('The produtos solicitaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos solicitaco could not be saved. Please, try again.'));
        }
        $categorias = $this->ProdutosSolicitacoes->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('produtosSolicitaco', 'categorias'));
        $this->set('_serialize', ['produtosSolicitaco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos Solicitaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtosSolicitaco = $this->ProdutosSolicitacoes->get($id);
        if ($this->ProdutosSolicitacoes->delete($produtosSolicitaco)) {
            $this->Flash->success(__('The produtos solicitaco has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos solicitaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
