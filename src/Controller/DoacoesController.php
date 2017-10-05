<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;


/**
 * Doacoes Controller
 *
 * @property \App\Model\Table\DoacoesTable $Doacoes
 *
 * @method \App\Model\Entity\Doaco[] paginate($object = null, array $settings = [])
 */
class DoacoesController extends AppController
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
        $doacoes = $this->Doacoes->find()->where(['flg_ativo' => true,'pessoa.id' => $this->request->session()->read('Auth.User.pessoa_id')])->limit(10000);
        $this->set('doacoes',$doacoes);
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
        $doacao = $this->Doacoes->get($id, [
            'contain' => ['Pessoas', 'ProdutosDoacoes']
        ]);

        $this->set('doaco', $doacao);
        $this->set('_serialize', ['doaco']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doacao = $this->Doacoes->newEntity();
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

            $doacao = $this->Doacoes->patchEntity($doacao,$request);
            if ($this->Doacoes->save($doacao)) {
                $this->Flash->success(__('A doação foi cadastrada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doaco could not be saved. Please, try again.'));
        }
        
        $TableCategorias = TableRegistry::get('Categorias');
        $categorias = $TableCategorias->find('list',['conditions' => ['flg_ativo'=>true],'keyField' => 'id','valueField' => 'nome']);
    
        $this->set(compact('doacao', 'categorias'));
        $this->set('_serialize', ['doacao']);
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
        $doacao = $this->Doacoes->get($id);
        $doacao->categoria_id = $doacao->categoria['id'];
        $doacao->nome_categoria = $doacao->categoria['nome'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $response = $this->request->getData();
            $d = $this->Doacoes->get($id);
            $request = array(
                'descricao' => $response['descricao'],
                'quantidade' => $response['quantidade'],
                'flg_ativo' => true,
                'categoria' => array(
                    'id' =>  $response['categoria_id'],
                    'nome' => $response['nome_categoria'] 
                )
            );
            $doacao = $this->Doacoes->patchEntity($d, $request);
            if ($this->Doacoes->save($doacao)) {
                $this->Flash->success(__('A doação foi editada com sucesso.'));

                return $this->redirect(['controller' =>'doacoes' ,'action' => 'index']);
            }
            $this->Flash->error(__('The doaco could not be saved. Please, try again.'));
        }
        $TableCategorias = TableRegistry::get('Categorias');
        $categorias = $TableCategorias->find('list',['conditions' => ['flg_ativo'=>true],'keyField' => 'id','valueField' => 'nome']);
       
        $this->set(compact('doacao','categorias'));
        $this->set('_serialize', ['doacao']);
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
        $doacao = $this->Doacoes->get($id);
        $doacao->flg_ativo = false;
        if ($this->Doacoes->save($doacao)) {
            $this->Flash->success(__('A doação foi excluida com sucesso'));
        } else {
            $this->Flash->error(__('The doaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
