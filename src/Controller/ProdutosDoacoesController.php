<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutosDoacoes Controller
 *
 * @property \App\Model\Table\ProdutosDoacoesTable $ProdutosDoacoes
 *
 * @method \App\Model\Entity\ProdutosDoaco[] paginate($object = null, array $settings = [])
 */
class ProdutosDoacoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias']
        ];
        $produtosDoacoes = $this->paginate($this->ProdutosDoacoes);

        $this->set(compact('produtosDoacoes'));
        $this->set('_serialize', ['produtosDoacoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Produtos Doaco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtosDoaco = $this->ProdutosDoacoes->get($id, [
            'contain' => ['Categorias']
        ]);

        $this->set('produtosDoaco', $produtosDoaco);
        $this->set('_serialize', ['produtosDoaco']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtosDoaco = $this->ProdutosDoacoes->newEntity();
        if ($this->request->is('post')) {
            $produtosDoaco = $this->ProdutosDoacoes->patchEntity($produtosDoaco, $this->request->getData());
            if ($this->ProdutosDoacoes->save($produtosDoaco)) {
                $this->Flash->success(__('The produtos doaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos doaco could not be saved. Please, try again.'));
        }
        $categorias = $this->ProdutosDoacoes->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('produtosDoaco', 'categorias'));
        $this->set('_serialize', ['produtosDoaco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos Doaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtosDoaco = $this->ProdutosDoacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosDoaco = $this->ProdutosDoacoes->patchEntity($produtosDoaco, $this->request->getData());
            if ($this->ProdutosDoacoes->save($produtosDoaco)) {
                $this->Flash->success(__('The produtos doaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos doaco could not be saved. Please, try again.'));
        }
        $categorias = $this->ProdutosDoacoes->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('produtosDoaco', 'categorias'));
        $this->set('_serialize', ['produtosDoaco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos Doaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtosDoaco = $this->ProdutosDoacoes->get($id);
        if ($this->ProdutosDoacoes->delete($produtosDoaco)) {
            $this->Flash->success(__('The produtos doaco has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos doaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
