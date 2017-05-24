<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Solicitacoes Controller
 *
 * @property \App\Model\Table\SolicitacoesTable $Solicitacoes
 *
 * @method \App\Model\Entity\Solicitaco[] paginate($object = null, array $settings = [])
 */
class SolicitacoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'Produtos']
        ];
        $solicitacoes = $this->paginate($this->Solicitacoes);

        $this->set(compact('solicitacoes'));
        $this->set('_serialize', ['solicitacoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Solicitaco id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solicitaco = $this->Solicitacoes->get($id, [
            'contain' => ['Pessoas', 'Produtos']
        ]);

        $this->set('solicitaco', $solicitaco);
        $this->set('_serialize', ['solicitaco']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $solicitaco = $this->Solicitacoes->newEntity();
        if ($this->request->is('post')) {
            $solicitaco = $this->Solicitacoes->patchEntity($solicitaco, $this->request->getData());
            if ($this->Solicitacoes->save($solicitaco)) {
                $this->Flash->success(__('The solicitaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solicitaco could not be saved. Please, try again.'));
        }
        $pessoas = $this->Solicitacoes->Pessoas->find('list', ['limit' => 200]);
        $produtos = $this->Solicitacoes->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('solicitaco', 'pessoas', 'produtos'));
        $this->set('_serialize', ['solicitaco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Solicitaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $solicitaco = $this->Solicitacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solicitaco = $this->Solicitacoes->patchEntity($solicitaco, $this->request->getData());
            if ($this->Solicitacoes->save($solicitaco)) {
                $this->Flash->success(__('The solicitaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solicitaco could not be saved. Please, try again.'));
        }
        $pessoas = $this->Solicitacoes->Pessoas->find('list', ['limit' => 200]);
        $produtos = $this->Solicitacoes->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('solicitaco', 'pessoas', 'produtos'));
        $this->set('_serialize', ['solicitaco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Solicitaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solicitaco = $this->Solicitacoes->get($id);
        if ($this->Solicitacoes->delete($solicitaco)) {
            $this->Flash->success(__('The solicitaco has been deleted.'));
        } else {
            $this->Flash->error(__('The solicitaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
