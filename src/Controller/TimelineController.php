<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ElasticSearch\TypeRegistry;

class TimelineController extends AppController
{
	public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->layout('admin'); 
    }
    public function index(){
	  	$tableDoacoes = TypeRegistry::get('Doacoes');
        $doacoes = $tableDoacoes->find()->where(['flg_ativo' => true]);

        $tableSolicitacoes = TypeRegistry::get('Solicitacoes');
        $solicitacoes = $tableSolicitacoes->find()->where(['flg_ativo' => true]);

        $this->set(compact('solicitacoes','doacoes'));
        $this->set('_serialize', ['solicitacoes','doacoes']);
    }
}