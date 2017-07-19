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
        $this->viewBuilder()->layout('admin');
        $this->paginate = [
            'contain' => ['Enderecos','Enderecos.Cidades','Enderecos.Cidades','Enderecos.Cidades.Estados','Enderecos.Cidades.Estados.Pais'],
            'limit' => 5,
            'order' => ['Sedes.nome' => 'asc']
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
        $this->viewBuilder()->layout('admin');
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
        $this->viewBuilder()->layout('admin');
        $sede = $this->Sedes->newEntity();
        $pais = $this->Sedes->Enderecos->Cidades->Estados->Pais->find('list',['keyField' => 'id','valueField' => 'nome']);
        if ($this->request->is('post')) {
            $sede = $this->Sedes->patchEntity($sede, $this->request->getData());
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
        $this->viewBuilder()->layout('admin');
        $sede = $this->Sedes->get($id, [
            'contain' => ['Enderecos','Enderecos.Cidades','Enderecos.Cidades','Enderecos.Cidades.Estados','Enderecos.Cidades.Estados.Pais']
        ]);

        $pais = $this->Sedes->Enderecos->Cidades->Estados->Pais->find('list',['keyField' => 'id','valueField' => 'nome']);

        $estados = $this->Sedes->Enderecos->Cidades->Estados->find('list',['conditions' => ['pais_id' => $sede->endereco->cidade->estado->pai->id],'keyField' => 'id','valueField' => 'nome']);

        $cidades = $this->Sedes->Enderecos->Cidades->find('list',['conditions' => ['estado_id' => $sede->endereco->cidade->estado->id],'keyField' => 'id','valueField' => 'nome']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $sede = $this->Sedes->patchEntity($sede, $this->request->getData());
            if ($this->Sedes->save($sede)) {
                $this->Flash->success(__('The sede has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sede could not be saved. Please, try again.'));
        }
        $this->set(compact('sede','pais','estados','cidades'));
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

    public function getEstadoByPais($id_pais){
        $estados = $this->Sedes->Enderecos->Cidades->Estados->find('list',['keyField' => 'id','valueField' => 'nome','conditions' => ['pais_id' => $id_pais]]);
        $processar = !$estados->count() > 0 ? false : true;
        $result = array('processar' => $processar,'arrayComboBox' => $estados);
        $this->response->type('json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

    public function getCidadeByEstado($id_estado){
        $cidades = $this->Sedes->Enderecos->Cidades->find('list',['keyField' => 'id','valueField' => 'nome','conditions' => ['estado_id' => $id_estado]]);
        $processar = !$cidades->count() > 0 ? false : true;
        $result = array('processar' => $processar,'arrayComboBox' => $cidades);
        $this->response->type('json');
        $this->response->body(json_encode($result));
        return $this->response;
    }
}
