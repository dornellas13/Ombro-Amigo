<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;



/**
 * Solicitacoes Controller
 *
 * @property \App\Model\Table\SolicitacoesTable $Solicitacoes
 *
 * @method \App\Model\Entity\Solicitaco[] paginate($object = null, array $settings = [])
 */
class SolicitacoesController extends AppController
{

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->layout('admin'); 
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    
        $solicitacoes = $this->Solicitacoes->find()->where(['flg_ativo' => true,'pessoa.id' => $this->request->session()->read('Auth.User.pessoa_id')])->limit(10000);

        $this->set(compact('solicitacoes'));
        $this->set('_serialize', ['solicitacoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Solicitaco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solicitaco = $this->Solicitacoes->get($id, [
            'contain' => ['Pessoas', 'ProdutosSolicitacoes']
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
        $solicitacao = $this->Solicitacoes->newEntity();
        if ($this->request->is('post')) {
            $response = $this->request->getData();
            $usuario = $this->GetUsuarioLogado();
            $request = array(
                'descricao' => $response['descricao'],
                'quantidade' => $response['quantidade'],
                'flg_ativo' => true,
                'categoria' => array(
                    'id' =>  $response['categoria_id'],
                    'nome' => $response['nome_categoria'] 
                ),
                'pessoa' => array(
                    'id' => $usuario->pessoa->id,
                    'nome' => $usuario->pessoa->nome_razao_social 
                ),
                "created" => date('d/m/Y')
            );
            $solicitacao = $this->Solicitacoes->patchEntity($solicitacao,$request);
            if ($this->Solicitacoes->save($solicitacao)) {
                $this->Flash->success(__('A solicitação foi cadastrada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doaco could not be saved. Please, try again.'));
        }
        
        $TableCategorias = TableRegistry::get('Categorias');
        $categorias = $TableCategorias->find('list',['conditions' => ['flg_ativo'=>true],'keyField' => 'id','valueField' => 'nome']);
        
        $this->set(compact('solicitacao', 'categorias'));
        $this->set('_serialize', ['solicitacao']);
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
         $solicitacao = $this->Solicitacoes->get($id);
         $solicitacao->categoria_id = $solicitacao->categoria['id'];
         $solicitacao->nome_categoria = $solicitacao->categoria['nome'];

         if ($this->request->is(['patch', 'post', 'put'])) {
             $response = $this->request->getData();
             $d = $this->Solicitacoes->get($id);
             $request = array(
                 'descricao' => $response['descricao'],
                 'quantidade' => $response['quantidade'],
                 'flg_ativo' => true,
                 'categoria' => array(
                     'id' =>  $response['categoria_id'],
                     'nome' => $response['nome_categoria'] 
                 )
             );
             $solicitacao = $this->Solicitacoes->patchEntity($d, $request);
             if ($this->Solicitacoes->save($solicitacao)) {
                 $this->Flash->success(__('A doação foi editada com sucesso.'));

                 return $this->redirect(['controller' =>'solicitacoes' ,'action' => 'index']);
             }
             $this->Flash->error(__('The doaco could not be saved. Please, try again.'));
         }
         
         $TableCategorias = TableRegistry::get('Categorias');
         $categorias = $TableCategorias->find('list',['conditions' => ['flg_ativo'=>true],'keyField' => 'id','valueField' => 'nome']);
         
         $this->set(compact('solicitacao','categorias'));
         $this->set('_serialize', ['solicitacao']);
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
            $this->Flash->success(__('A solicitação foi deletada com sucesso.'));
        } else {
            $this->Flash->error(__('The solicitaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
