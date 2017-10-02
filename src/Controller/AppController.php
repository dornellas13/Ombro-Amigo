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
use \YaLinqo\Enumerable;
use Cake\I18n\Time;
use Cake\I18n\Data;
use Cake\I18n\Number;
use Cake\Database\Type;
// Habilita o parseamento de datas localizadas
Type::build('date')
 ->useLocaleParser()
 ->setLocaleFormat('dd/MM/yyyy');
Type::build('datetime')
 ->useLocaleParser()
 ->setLocaleFormat('dd/MM/yyyy HH:mm:ss');
Type::build('timestamp')
 ->useLocaleParser()
 ->setLocaleFormat('dd/MM/yyyy HH:mm:ss');
 
// Habilita o parseamento de decimal localizaddos
Type::build('decimal')
 ->useLocaleParser();
Type::build('float')
 ->useLocaleParser();
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
     
        $doacoes->where(['pessoa.id' => $usuario->pessoa->id,'flg_ativo' => true])->limit(10000);

        $tableSolicitacoes = TypeRegistry::get('Solicitacoes');
        $solicitacoes = $tableSolicitacoes->find()->where(['pessoa.id !=' => $usuario->pessoa->id,'flg_ativo' => true])->limit(10000);

        $result = from($doacoes)
        ->orderBy('$d ==> $d["descricao"]')
        ->groupJoin(
            from($solicitacoes)
                ->orderBy('$s ==> $s["descricao"]'),
            '$d ==> $d["categoria"]["id"]','$s ==> $s["categoria"]["id"]',
            '($d, $result) ==> $result'
        )->selectMany()->toArray();

        return array('Total' => count(array_unique($result)), 'Combinacoes' => array_unique($result));

    }


    public function RealizaCombinacaoSolicitacao(){

        $usuario = $this->GetUsuarioLogado();

        $tableSolicitacoes = TypeRegistry::get('Solicitacoes');
        $solicitacoes = $tableSolicitacoes->find();
        $solicitacoes->where(['pessoa.id' => $usuario->pessoa->id,'flg_ativo' => true])->limit(10000);

        $tableDoacoes = TypeRegistry::get('Doacoes');
        $doacoes = $tableDoacoes->find()->where(['pessoa.id !=' => $usuario->pessoa->id,'flg_ativo' => true])->limit(10000);
       
       $result = from($solicitacoes)
       ->orderBy('$d ==> $d["descricao"]')
       ->groupJoin(
           from($doacoes)
               ->orderBy('$s ==> $s["descricao"]'),
           '$d ==> $d["categoria"]["id"]','$s ==> $s["categoria"]["id"]',
           '($d, $result) ==> $result'
       )->selectMany()->toArray();

       return array('Total' => count(array_unique($result)), 'Combinacoes' => array_unique($result));
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

        if($this->Auth->user()){
            TypeRegistry::get('Solicitacoes')->connection()->getIndex()->refresh();
            TypeRegistry::get('Doacoes')->connection()->getIndex()->refresh();
            $resultDoacoes = $this->RealizaCombinacaoDoacao();
            $resultSolicitacoes = $this->RealizaCombinacaoSolicitacao();
            $this->set(compact('resultDoacoes','resultSolicitacoes'));
            $this->set('_serialize', ['resultDoacoes','resultSolicitacoes']);
        }

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
