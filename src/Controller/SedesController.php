<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sedes Controller
 *
 * @property \App\Model\Table\SedesTable $Sedes
 *
 * @method \App\Model\Entity\Sede[] paginate($object = null, array $settings = [])
 */
class SedesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Enderecos']
        ];
        $sedes = $this->paginate($this->Sedes);

        $this->set(compact('sedes'));
        $this->set('_serialize', ['sedes']);
    }

    /**
     * View method
     *
     * @param string|null $id Sede id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sede = $this->Sedes->get($id, [
            'contain' => ['Enderecos']
        ]);

        $this->set('sede', $sede);
        $this->set('_serialize', ['sede']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sede = $this->Sedes->newEntity();
        $cidades = $this->Sedes->Enderecos->Cidades->find('list',['keyField' => 'id','valueField' => 'nome']);
        $estados = $this->Sedes->Enderecos->Cidades->Estados->find('list',['keyField' => 'id','valueField' => 'nome']);
        $pais = $this->Sedes->Enderecos->Cidades->Estados->Pais->find('list',['keyField' => 'id','valueField' => 'nome']);
        if ($this->request->is('post')) {
            $sede = $this->Sedes->patchEntity($sede, $this->request->getData(),['associated' => ['Enderecos','Enderecos.Cidades','Enderecos.Cidades.Estados','Enderecos.Cidades.Estados.Pais']]);
            if ($this->Sedes->save($sede)) {
                $this->Flash->success(__('The sede has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sede could not be saved. Please, try again.'));
        }
        $this->set(compact('sede','cidades','estados','pais'));
        $this->set('_serialize', ['sede']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sede id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sede = $this->Sedes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sede = $this->Sedes->patchEntity($sede, $this->request->getData());
            if ($this->Sedes->save($sede)) {
                $this->Flash->success(__('The sede has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sede could not be saved. Please, try again.'));
        }
        $enderecos = $this->Sedes->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('sede', 'enderecos'));
        $this->set('_serialize', ['sede']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sede id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sede = $this->Sedes->get($id);
        if ($this->Sedes->delete($sede)) {
            $this->Flash->success(__('The sede has been deleted.'));
        } else {
            $this->Flash->error(__('The sede could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
