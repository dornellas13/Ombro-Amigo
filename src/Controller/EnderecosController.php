<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Enderecos Controller
 *
 * @property \App\Model\Table\EnderecosTable $Enderecos
 *
 * @method \App\Model\Entity\Endereco[] paginate($object = null, array $settings = [])
 */
class EnderecosController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('getEstadoByPais');
        $this->Auth->allow('getCidadeByEstado');

    }

    public function getEstadoByPais($id_pais){
        $estados = $this->Enderecos->Cidades->Estados->find('list',['keyField' => 'id','valueField' => 'nome','conditions' => ['pais_id' => $id_pais]]);
        $processar = !$estados->count() > 0 ? false : true;
        $result = array('processar' => $processar,'arrayComboBox' => $estados);
        $this->response->type('json');
        $this->response->body(json_encode($result));
        return $this->response;
    }
    public function getCidadeByEstado($id_estado){
        $cidades = $this->Enderecos->Cidades->find('list',['keyField' => 'id','valueField' => 'nome','conditions' => ['estado_id' => $id_estado]]);
        $processar = !$cidades->count() > 0 ? false : true;
        $result = array('processar' => $processar,'arrayComboBox' => $cidades);
        $this->response->type('json');
        $this->response->body(json_encode($result));
        return $this->response;
    }
}
