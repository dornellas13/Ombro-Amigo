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
    private function AutenticacaoUsuario()
    {
        $idUsuarioLogado = $this->request->session()->read('Auth.User.id');
        if(!empty($idUsuarioLogado)){
            $TableUsers = TableRegistry::get('Users');
            $UsuarioLogado = $TableUsers->get($idUsuarioLogado, [
            'contain' => ['Pessoas']
            ]);
            $this->set('UsuarioLogado',$UsuarioLogado);
        }
    }

    public function GetInformacoesUsuarioLogado()
    {
        $TableUsers = TableRegistry::get('Users');
        $idUsuarioLogado = $this->request->session()->read('Auth.User.id');
        $UsuarioLogado = $TableUsers->get($idUsuarioLogado, [
            'contain' => ['Pessoas','Pessoas.Doacoes','Pessoas.Solicitacoes','Pessoas.Doacoes.ProdutosDoacoes','Pessoas.Solicitacoes.ProdutosSolicitacoes','Pessoas.Enderecos','Pessoas.Enderecos.Cidades','Pessoas.Enderecos.Cidades.Estados','Pessoas.Enderecos.Cidades.Estados.Pais','Pessoas.Solicitacoes.ProdutosSolicitacoes.Categorias','Pessoas.Doacoes.ProdutosDoacoes.Categorias']
            ]);
        return $UsuarioLogado;
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

        $this->AutenticacaoUsuario();

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
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Métodos que estão liberados para todos visualizarem.
         
         // Carregar tabelas a serem utilizadas com o 'Elastic Search'
         // Carrega o Type usando o provedor 'Elastic'
         $this->loadModel('Categorias', 'Elastic');
         //$this->loadModel('Solicitacoes','Elastic');
         //$this->loadModel('Doacoes','Elastic');

    }
}
