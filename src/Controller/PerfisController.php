<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ElasticSearch\TypeRegistry;


/**
 * Perfis Controller
 *
 * @property \App\Model\Table\PerfisTable $Perfis
 *
 * @method \App\Model\Entity\Perfi[] paginate($object = null, array $settings = [])
 */
class PerfisController extends AppController
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
        $this->viewBuilder()->layout('admin');
        $perfis = $this->paginate($this->Perfis);

        $this->set(compact('perfis'));
        $this->set('_serialize', ['perfis']);
    }

    /**
     * View method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perfi = $this->Perfis->get($id, [
            'contain' => ['Funcionalidades']
        ]);

        $this->set('perfi', $perfi);
        $this->set('_serialize', ['perfi']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perfi = $this->Perfis->newEntity();
        if ($this->request->is('post')) {
            $perfi = $this->Perfis->patchEntity($perfi, $this->request->getData());
            if ($this->Perfis->save($perfi)) {
                $this->Flash->success(__('The perfi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfi could not be saved. Please, try again.'));
        }
        $funcionalidades = $this->Perfis->Funcionalidades->find('list', ['limit' => 200]);
        $this->set(compact('perfi', 'funcionalidades'));
        $this->set('_serialize', ['perfi']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perfi = $this->Perfis->get($id, [
            'contain' => ['Funcionalidades']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $perfi = $this->Perfis->patchEntity($perfi, $this->request->getData());
            if ($this->Perfis->save($perfi)) {
                $this->Flash->success(__('The perfi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfi could not be saved. Please, try again.'));
        }
        $funcionalidades = $this->Perfis->Funcionalidades->find('list', ['limit' => 200]);
        $this->set(compact('perfi', 'funcionalidades'));
        $this->set('_serialize', ['perfi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $perfi = $this->Perfis->get($id);
        if ($this->Perfis->delete($perfi)) {
            $this->Flash->success(__('The perfi has been deleted.'));
        } else {
            $this->Flash->error(__('The perfi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
