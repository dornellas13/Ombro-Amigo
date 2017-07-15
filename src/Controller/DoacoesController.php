<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Doacoes Controller
 *
 * @property \App\Model\Table\DoacoesTable $Doacoes
 *
 * @method \App\Model\Entity\Doaco[] paginate($object = null, array $settings = [])
 */
class DoacoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'ProdutosDoacoes']
        ];
        $doacoes = $this->paginate($this->Doacoes);

        $this->set(compact('doacoes'));
        $this->set('_serialize', ['doacoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Doaco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doaco = $this->Doacoes->get($id, [
            'contain' => ['Pessoas', 'ProdutosDoacoes']
        ]);

        $this->set('doaco', $doaco);
        $this->set('_serialize', ['doaco']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doaco = $this->Doacoes->newEntity();
        if ($this->request->is('post')) {
            $doaco = $this->Doacoes->patchEntity($doaco, $this->request->getData());
            if ($this->Doacoes->save($doaco)) {
                $this->Flash->success(__('The doaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doaco could not be saved. Please, try again.'));
        }
        $pessoas = $this->Doacoes->Pessoas->find('list', ['limit' => 200]);
        $produtosDoacoes = $this->Doacoes->ProdutosDoacoes->find('list', ['limit' => 200]);
        $this->set(compact('doaco', 'pessoas', 'produtosDoacoes'));
        $this->set('_serialize', ['doaco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Doaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doaco = $this->Doacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doaco = $this->Doacoes->patchEntity($doaco, $this->request->getData());
            if ($this->Doacoes->save($doaco)) {
                $this->Flash->success(__('The doaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doaco could not be saved. Please, try again.'));
        }
        $pessoas = $this->Doacoes->Pessoas->find('list', ['limit' => 200]);
        $produtosDoacoes = $this->Doacoes->ProdutosDoacoes->find('list', ['limit' => 200]);
        $this->set(compact('doaco', 'pessoas', 'produtosDoacoes'));
        $this->set('_serialize', ['doaco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doaco = $this->Doacoes->get($id);
        if ($this->Doacoes->delete($doaco)) {
            $this->Flash->success(__('The doaco has been deleted.'));
        } else {
            $this->Flash->error(__('The doaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
