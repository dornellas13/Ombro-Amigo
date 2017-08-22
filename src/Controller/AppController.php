<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ElasticSearch\TypeRegistry;
use Cake\ElasticSearch\Document;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function GetUsuarioLogado()
    {
        $idUsuarioLogado = $this->request->session()->read('Auth.User.id');
        $TableUsers = TableRegistry::get('Users');
        if(!empty($idUsuarioLogado)){
            return $TableUsers->get($idUsuarioLogado, [
            'contain' => ['Pessoas']
            ]);
        }
    }

    public function RealizaCombinacaoDoacao(){
        $usuario = $this->GetUsuarioLogado();

        $tableDoacoes = TypeRegistry::get('Doacoes');
        $doacoes = $tableDoacoes->find();
        $doacoes->where(['pessoa.id' => $usuario->pessoa->id,'flg_ativo' => true]);
        $tableSolicitacoes = TypeRegistry::get('Solicitacoes');
        $solicitacoes = $tableSolicitacoes->find();
        foreach ($doacoes as $result) {
           $Combinacoes = $solicitacoes->where(['pessoa.id !=' => $usuario->pessoa->id,'flg_ativo' => true,'categoria.id' => $result->categoria['id']]);
        }
        // Faltando filtro de LIKE PARA DESCRICAO.
        return array('Total' => count($Combinacoes->toArray()), 'Combinacoes' => $Combinacoes->toArray());

    }


    public function RealizaCombinacaoSolicitacao(){

        $usuario = $this->GetUsuarioLogado();

        $tableSolicitacoes = TypeRegistry::get('Solicitacoes');
        $solicitacoes = $tableSolicitacoes->find();
        $solicitacoes->where(['pessoa.id' => $usuario->pessoa->id,'flg_ativo' => true]);

        $tableDoacoes = TypeRegistry::get('Doacoes');
        $doacoes = $tableDoacoes->find();

        foreach ($solicitacoes as $result) {
           $Combinacoes = $doacoes->where(['pessoa.id !=' => $usuario->pessoa->id,'flg_ativo' => true,'categoria.id' => $result->categoria['id']]);
        }

        return array('Total' => count($Combinacoes->toArray()), 'Combinacoes' => $Combinacoes->toArray());
    }


    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
                // 'plugin' => 'Users'
            ],
            'authError' => 'Você realmente pensou que você pode ver isso?',
            'loginRedirect' => [
                'controller' => 'timeline',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'home',
                'action' => 'index'
            ],
            'storage' => 'Session'
        ]);

        $resultDoacoes = $this->RealizaCombinacaoDoacao();
        $resultSolicitacoes = $this->RealizaCombinacaoSolicitacao();
        $this->set(compact('resultDoacoes','resultSolicitacoes'));
        $this->set('_serialize', ['resultDoacoes','resultSolicitacoes']);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
 
        $this->set('UsuarioLogado',$this->GetUsuarioLogado());
        // Seta Variavel Global de Usuário Logado.
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Métodos que estão liberados para todos visualizarem.
         
         // Carregar tabelas a serem utilizadas com o 'Elastic Search'
         // Carrega o Type usando o provedor 'Elastic'
         $this->loadModel('Solicitacoes','Elastic');
         $this->loadModel('Doacoes','Elastic');

    }
}
