<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ElasticSearch\TypeRegistry;
use \YaLinqo\Enumerable;
use Cake\I18n\Date;
use Cake\I18n\Time;
use \Datetime;
/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 *
 * @method \App\Model\Entity\Categoria[] paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
	public function beforeFilter(Event $event)
	{
	    parent::beforeFilter($event);
	   	$this->Auth->allow(['index','GetDadosGrafico']);
	}

	public function index()
	{
        
	}

	public function GetDadosGrafico(){
        $tableDoacoes = TypeRegistry::get('Doacoes');
        $tableSolicitacoes = TypeRegistry::get('Solicitacoes');
        $doacoes = $tableDoacoes->find()->where(['flg_ativo' => true])->limit(10000);
        $solicitacoes = $tableSolicitacoes->find()->where(['flg_ativo' => true])->limit(10000);
   		$valorMesesDoacoes = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $valorMesesSolicitacoes = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach ($doacoes as $result) {
        	$mes = (int)date('n', strtotime(str_replace('/', '-', $result['created'])));
        	switch ($mes) {
        		case 1:$valorMesesDoacoes[0] += 1;break;
    			case 2:$valorMesesDoacoes[1] += 1;break;
    			case 3: $valorMesesDoacoes[2] +=1;break;
    			case 4: $valorMesesDoacoes[3] +=1;break;
    			case 5: $valorMesesDoacoes[4] +=1;break;
    			case 6: $valorMesesDoacoes[5] +=1;break;
    			case 7: $valorMesesDoacoes[6] +=1;break;
    			case 8: $valorMesesDoacoes[7] +=1;break;
    			case 9: $valorMesesDoacoes[8] +=1;break;
    			case 10: $valorMesesDoacoes[9] +=1;break;
    			case 11: $valorMesesDoacoes[10] +=1;break;
        		default:$valorMesesDoacoes[11] +=1;break;
        	}
        }
        foreach ($solicitacoes as $result) {
            $mes = (int)date('n', strtotime(str_replace('/', '-', $result['created'])));
            switch ($mes) {
                case 1:$valorMesesSolicitacoes[0] += 1;break;
                case 2:$valorMesesSolicitacoes[1] += 1;break;
                case 3: $valorMesesSolicitacoes[2] +=1;break;
                case 4: $valorMesesSolicitacoes[3] +=1;break;
                case 5: $valorMesesSolicitacoes[4] +=1;break;
                case 6: $valorMesesSolicitacoes[5] +=1;break;
                case 7: $valorMesesSolicitacoes[6] +=1;break;
                case 8: $valorMesesSolicitacoes[7] +=1;break;
                case 9: $valorMesesSolicitacoes[8] +=1;break;
                case 10: $valorMesesSolicitacoes[9] +=1;break;
                case 11: $valorMesesSolicitacoes[10] +=1;break;
                default:$valorMesesSolicitacoes[11] +=1;break;
            }
        }

        $this->response->type('json');
        $this->response->body(json_encode(['doacoes' => $valorMesesDoacoes,'solicitacoes' => $valorMesesSolicitacoes]));
        return $this->response;
	}
}