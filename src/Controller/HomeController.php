<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
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
	   	$this->Auth->allow(['index']);
	}

	public function index()
	{
		
	}
}